<?php

// I know it's de-facto public, it's mainly targeting web robots and search engines
if (isset($_GET['auth']) && $_GET['auth'] === '8gG[]TzwR(9rXw') {
    setcookie('staging_access', 'allowed');
}

header("Location:http://new.khanovaskola.cz/");
