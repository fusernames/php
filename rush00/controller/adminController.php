<?php

function administrationAction()
{
  adminOnly();
  require VIEW.'admin/administration.php';
}
