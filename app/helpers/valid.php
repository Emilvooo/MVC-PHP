<?php
namespace App\Helpers;

class Valid {
    public function isEmpty($get_data, $required)
    {
        if (!empty($_POST)) {
            $fields = array();

            foreach ($required as $field) {
                if (empty($get_data[$field])) {
                    $fields[] = $field;
                }
            }

            if (!empty($fields)) {
                return 'Vul dit veld in: '.implode(', ', $fields);
            }

            return true;
        }
        return false;
    }

    public function isValid($get_data, $types)
    {
        $fields = array();

        foreach ($types as $type => $field) {
            if ($type == 'email') {
                if (!filter_var($get_data[$field], FILTER_VALIDATE_EMAIL)) {
                    $fields[] = $field;
                }
            }

            if ($type == 'number') {
                if (!is_numeric($get_data[$field])) {
                    $fields[] = $field;
                }
            }
        }

        if (!empty($fields)) {
            return 'Onjuist(e) veld(en): '.implode(', ', $fields);
        }

        return true;
    }

}