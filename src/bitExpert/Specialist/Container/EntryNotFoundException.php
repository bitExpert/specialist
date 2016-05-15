<?php

/**
 * This file is part of the Specialist package.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\Specialist\Container;

use Interop\Container\Exception\NotFoundException;

/**
 * Implementation of the {@link \Interop\Container\Exception\NotFoundException} interface
 */
class EntryNotFoundException extends \InvalidArgumentException implements NotFoundException
{

}