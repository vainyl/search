<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Search
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Search\Exception;

use Vainyl\Search\IndexInterface;

/**
 * Class UnsupportedIndexException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedIndexException extends AbstractIndexException
{
    private $name;

    /**
     * UnsupportedObjectException constructor.
     *
     * @param IndexInterface $index
     * @param string         $name
     */
    public function __construct(IndexInterface $index, string $name)
    {
        $this->name = $name;
        parent::__construct($index, sprintf('Index %s does not support domain %s', $index->getName(), $name));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['name' => $this->name], parent::toArray());
    }
}