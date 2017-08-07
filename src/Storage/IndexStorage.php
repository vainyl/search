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

namespace Vainyl\Search\Storage;

use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;
use Vainyl\Search\IndexInterface;

/**
 * Class IndexStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class IndexStorage extends AbstractStorageDecorator implements IndexStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getIndex(string $name): IndexInterface
    {
        return $this->offsetGet($name);
    }

    /**
     * @inheritDoc
     */
    public function addIndex(IndexInterface $index): IndexStorageInterface
    {
        $this->offsetSet($index->getName(), $index);

        return $this;
    }
}