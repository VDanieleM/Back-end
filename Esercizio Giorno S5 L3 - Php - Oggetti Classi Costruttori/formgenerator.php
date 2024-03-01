<?php

class FormGenerator
{
    private $fields;

    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    public function generateForm()
    {
        echo '<form method="post" action="process_form.php">';
        foreach ($this->fields as $field) {
            echo '<label for="' . $field . '">' . ucfirst($field) . ':</label>';
            echo '<input type="text" name="' . $field . '" required><br>';
        }
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    }
}

// Configurazione del form
$fields = array('colore_preferito', 'eta', 'piatto_preferito');

// Creazione del form utilizzando la classe
$formGenerator = new FormGenerator($fields);
$formGenerator->generateForm();

?>