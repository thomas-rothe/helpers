<?php

$columnsToAdd = array(
    array(
        'table' => 'customer',
        'column' => 'my_column',
        'datatype' => 'VARCHAR(255)',
    ),
    array(
        'table' => 'customer',
        'column' => 'my_other_column',
        'datatype' => 'TINYINT(1)',
    ),
);

/* Build SQL statements */
$sqls = array();
foreach ($columnsToAdd as $columnToAdd) {
    $table = $columnToAdd['table'];
    $column = $columnToAdd['column'];
    $datatype = $columnToAdd['datatype'];
    
    /* Check if column exists */
    $found = myColumnExists($table, $column);
    
    /* Add column */
    if( ! $found ) {
        $sqls[] = 'ALTER TABLE `' . _DB_PREFIX_ . $table . '` ADD `' . $column . '` ' . $datatype;
    }
}

/* Execute SQL statements*/
foreach ( $sqls as $sql ) {
    if ( Db::getInstance()->execute( $sql ) == false ) {
        return false;
    }
}

/* Functions */
function myColumnExists($table, $column) {
    $existingColumns = Db::getInstance()->executeS( 'DESCRIBE `' . _DB_PREFIX_ . $table . '`' );
    foreach( $existingColumns as $existingColumn ) {
        if( $existingColumn[ 'Field' ] == $column ){
            return true;
        }
    }
    return false;
}
