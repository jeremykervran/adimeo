<?php

namespace Adimeo\BaseDocumentaire\ACF;

class Fields {
	private int $base_year = 1900;

	private array $months = [
		1 => 'Janvier',
		2 => 'Février',
		3 => 'Mars',
		4 => 'Avril',
		5 => 'Mai',
		6 => 'Juin',
		7 => 'Juillet',
		8 => 'Aout',
		9 => 'Septembre',
		10 => 'Octobre',
		11 => 'Novembre',
		12 => 'Decembre',
	];

	public function __construct() {
		add_filter('acf/load_field/name=annee', [$this, 'load_year_field']);
		add_filter('acf/load_field/name=mois', [$this, 'load_month_field']);
		add_filter('acf/load_field/name=jour', [$this, 'load_day_field']);
		add_filter('acf/validate_value/name=jour', [$this, 'validate_day_field'], 10, 4);
	}

	public function load_year_field($field): array {
		$years_range = range(date('Y'), $this->base_year);

		// Utilisation de array combine pour avoir des clefs/valeurs identiques
		$field['choices'] = array_combine($years_range, $years_range);

		return $field;
	}

	public function load_month_field($field): array {
		$field['choices'] = $this->months;

		return $field;
	}

	public function load_day_field($field): array {
		$days_range = range(1, 31);

		// Utilisation de array combine pour avoir des clefs/valeurs identiques
		$field['choices'] = array_combine($days_range, $days_range);

		return $field;
	}

	/**
	 * Valider que la date est valide
	 *
	 * @param $valid
	 * @param $value
	 * @param $field
	 * @param $input
	 *
	 * @return true|string
	 */
	public function validate_day_field($valid, $value, $field, $input): true|string {
		// Si la valeur est déjà non-valide, on la retourne
		if (!$valid) {
			return $valid;
		}

		// On récupère l'année et le mois dans le $_POST
		$year = (int) $_POST['acf']['field_67615f309e657']['field_67615f4f9e658'];
		$month = (int) $_POST['acf']['field_67615f309e657']['field_676160679e659'];
		$day = (int) $value;

		// On vérifie que la date est valide, si elle ne l'est pas on renvoie un message d'erreur
		if (!checkdate($month, $day, $year)) {
			return 'La date choisie n\'est pas valide.';
		}

		return true;
	}

}