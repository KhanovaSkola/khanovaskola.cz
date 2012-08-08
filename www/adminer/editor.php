<?php
function adminer_object() {
    
    class AdminerSoftware extends Adminer {
        
        function name() {
            // custom name in title and heading
            return 'Khanova Škola';
        }
        
        function permanentLogin() {
            // key used for permanent login
            return "2a014694d0e4f73f8cc8b6fb9aec379d";
        }
        
        function credentials() {
            // server, username and password for connecting to database
            return array('localhost', 'root', '');
        }
        
        function database() {
            // database name, will be escaped by Adminer
            return 'khanacademy';
        }
        
        function login($login, $password) {
            // validate user submitted credentials
            return ($login == 'moderator' && $password == 'khan12'); // Gratuluji :) Můžete se podílet na vývoji Khanovy Školy <khan@dite.cz>
        }

        function tableName($tableStatus) {
            // tables without comments would return empty string and will be ignored by Adminer
            return h($tableStatus["Comment"]);
        }
        
        function fieldName($field, $order = 0) {
            // only columns with comments will be displayed
			return h($field["comment"]);
        }
        
    }
    
    return new AdminerSoftware;
}

include "./editor-3.5.0-mysql.php";
