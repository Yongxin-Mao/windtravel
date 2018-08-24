<?php



function esc($string)
{
  return htmlspecialchars($string, NULL, 'UTF-8', false);
}

function esc_attr($string)
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false);
}

