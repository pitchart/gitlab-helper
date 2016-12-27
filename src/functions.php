<?php

namespace Pitchart\GitlabHelper;

/**
 * Translates a string from underscored syntaxe to upper camel case
 *
 * @param $string
 * @return mixed
 */
function underscoredToUpperCamelCase($string)
{
    return str_replace(' ', '', ucwords(str_replace('_', ' ', \strtolower($string))));
}

/**
 * Translates a string from underscored syntaxe to lower camel case
 *
 * @param $string
 * @return string
 */
function underscoredToLowerCamelCase($string)
{
    return \lcfirst(underscoredToUpperCamelCase($string));
}