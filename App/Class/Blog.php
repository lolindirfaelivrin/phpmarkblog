<?php

class Blog  
{
    protected $slug;

    public function __construct() {
        $this->slug = $this->getSlug();
    }

    protected function getSlug() {
        $query = filter_input(INPUT_GET, 'q');

        if($query === false || $query === null) {
            return 'home';
        }

        $parts = explode('/', $query);
        $count = count($parts);

        if($count > 2) {
            return '404';
        } elseif ($count == 2) {
            if ($parts[0] == 'category') {
                return sprintf('category-%s', $parts[1]);
            }
        } else {
            return array_pop($parts);
        }

        return false;
    }
}
