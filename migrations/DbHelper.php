<?php


class DbHelper extends CDbMigration {
    /**
     * Gets the table name along with the specified non-null suffix.
     * In this case, a string made up as follows:
     *   'et_[speciality][group][name]_'
     * 
     * @param type $suffix the name of the table to create, prepended with
     * 'et_[speciality][group][name]_'.
     * 
     * @return the table name.
     */
    function getTableName($suffix) {
        return 'et_ophciglaucomaexamination_' . $suffix;
    }

    /**
     * Returns all the default table array elements that all tables share.
     * This is a convenience method for all table creation.
     * 
     * @param $suffix the table name suffix - this is the name of the table
     * without the formal table name 'et_[spec][group][code]_'.
     * 
     * @param useEvent by default, the event type is created as a foreign
     * key to the event table; set this to false to not create this key.
     * 
     * @return an array of defaults to merge in to the table array data required.
     */
    function getDefaults($suffix, $useEvent = true) {
        $defaults = array('last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
            'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01
			00:00:00\'',
            'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
            'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
            'PRIMARY KEY (`id`)',
            'KEY `' . $this->getTableName($suffix . '_event_id_fk') . '` (`event_id`)',
            'KEY `' . $this->getTableName($suffix . '_created_user_id_fk') . '`
			(`created_user_id`)',
            'KEY `' . $this->getTableName($suffix . '_last_modified_user_id_fk') . '`
			(`last_modified_user_id`)',
            'CONSTRAINT `' . $this->getTableName($suffix . '_event_id_fk') . '` FOREIGN KEY
			(`event_id`) REFERENCES `event` (`id`)',
            'CONSTRAINT `' . $this->getTableName($suffix . '_created_user_id_fk') . '`
			FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
            'CONSTRAINT
			`' . $this->getTableName($suffix . '_last_modified_user_id_fk') . '` FOREIGN KEY
			(`last_modified_user_id`) REFERENCES `user` (`id`)',);
        if ($useEvent == false) {
            $defaults = array('last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
                'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01
        00:00:00\'',
                'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
                'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
                'PRIMARY KEY (`id`)',
                'KEY `' . $this->getTableName($suffix . '_last_modified_user_id_fk') . '`
        (`last_modified_user_id`)',
                'CONSTRAINT `' . $this->getTableName($suffix . '_created_user_id_fk') . '`
        FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
                'CONSTRAINT
        `' . $this->getTableName($suffix . '_last_modified_user_id_fk') . '` FOREIGN KEY
        (`last_modified_user_id`) REFERENCES `user` (`id`)');
        }
        return $defaults;
    }

    /**
     * Delete data and drop table.
     * 
     * @param table_name the name of the table to delete data from; afterward,
     * drop the table.
     */
    function deleteTableAndData($table_name) {

        $this->delete($table_name);
        $this->dropTable($table_name);
    }

    /**
     * Deletes the specified element.
     * 
     * @param EventType $element_type the event type that this element relates to.
     * 
     * @param string $element_name the name of the element to create.
     */
    function deleteElement($event_type, $element_name) {

        $element_type = $this->dbConnection->createCommand()
                        ->select('id')
                        ->from('element_type')
                        ->where('name=:name and event_type_id=:event_type_id', array(
                            ':name' => $element_name,
                            ':event_type_id' => $event_type['id']
                        ))->queryRow();
        $this->delete('element_type', 'id=' . $element_type['id']);
    }
}
?>
