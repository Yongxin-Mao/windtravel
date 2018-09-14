<?php

//create the function that can escape the output
function esc($string)
{
  return htmlspecialchars($string, NULL, 'UTF-8', false);
}
//create the function that can escape the output in quotes
function esc_attr($string)
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false);
}

