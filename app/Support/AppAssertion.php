<?php

namespace SCCatalog\Support;

use Assert\Assertion;
use SCCatalog\Support\Exceptions\AssertionFailedException;

/**
 * Class AppAssertion
 *
 * @package    App\Support
 * @subpackage App\Support\AppAssertion
 */
class AppAssertion extends Assertion
{

    static protected $exceptionClass = AssertionFailedException::class;

}
