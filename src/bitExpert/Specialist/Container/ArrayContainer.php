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

use Psr\Container\ContainerInterface;

/**
 * An {@link \Psr\Container\ContainerInterface} which operates on a simple
 * array where entries are looked up using the given $id as key
 */
class ArrayContainer implements ContainerInterface
{
    /**
     * @var array
     */
    protected $entries;

    /**
     * ArrayContainer constructor.
     *
     * @param array $entries The key/value entries to operate on
     */
    public function __construct(array $entries = [])
    {
        $this->entries = $entries;
    }

    /**
     * @inheritdoc
     */
    public function has($id)
    {
        return isset($this->entries[$id]);
    }

    /**
     * @inheritdoc
     * @throws EntryNotFoundException
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new EntryNotFoundException(sprintf(
                'Could not find entry for id "%s"',
                $id
            ));
        }

        return $this->entries[$id];
    }

    /**
     * Sets the given $entry for the given $id
     *
     * @param $id
     * @param $entry
     * @return ArrayContainer
     */
    public function set($id, $entry)
    {
        $this->entries[$id] = $entry;
        return $this;
    }

    /**
     * Removes the entry for the given $id
     *
     * @param $id
     * @return ArrayContainer
     * @throws EntryNotFoundException
     */
    public function remove($id)
    {
        if (!$this->has($id)) {
            throw new EntryNotFoundException(sprintf(
                'Could not remove entry for id "%s" because it doesn\'t exist',
                $id
            ));
        }

        unset($this->entries[$id]);
        return $this;
    }
}
