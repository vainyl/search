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

namespace Vainyl\Search\Composite;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Search\Exception\UnsupportedIndexException;
use Vainyl\Search\FilterInterface;
use Vainyl\Search\IndexInterface;
use Vainyl\Search\SearchableInterface;
use Vainyl\Search\Storage\IndexStorageInterface;

/**
 * Class CompositeIndex
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompositeIndex extends AbstractIdentifiable implements IndexInterface
{
    private $indexStorage;

    /**
     * ElasticIndex constructor.
     *
     * @param IndexStorageInterface $indexStorage
     */
    public function __construct(IndexStorageInterface $indexStorage)
    {
        $this->indexStorage = $indexStorage;
    }

    /**
     * @inheritDoc
     */
    public function add(SearchableInterface $object): bool
    {
        if (false === $this->supports($object->getName())) {
            throw new UnsupportedIndexException($this, $object->getName());
        }

        return $this->indexStorage->getIndex($object->getName())->add($object);
    }

    /**
     * @inheritDoc
     */
    public function clear(): bool
    {
        /**
         * @var IndexInterface $index
         */
        foreach ($this->indexStorage->getIterator() as $index) {
            $index->clear();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function create(): bool
    {
        /**
         * @var IndexInterface $index
         */
        foreach ($this->indexStorage->getIterator() as $index) {
            $index->create();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function drop(): bool
    {
        /**
         * @var IndexInterface $index
         */
        foreach ($this->indexStorage->getIterator() as $index) {
            $index->drop();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function find(FilterInterface $filter): array
    {
        if (false === $this->supports($filter->getName())) {
            throw new UnsupportedIndexException($this, $filter->getName());
        }

        return $this->indexStorage->getIndex($filter->getName())->find($filter);
    }

    /**
     * @inheritDoc
     */
    public function findOne(FilterInterface $filter): ?SearchableInterface
    {
        if (false === $this->supports($filter->getName())) {
            throw new UnsupportedIndexException($this, $filter->getName());
        }

        return $this->indexStorage->getIndex($filter->getName())->findOne($filter);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'composite';
    }

    /**
     * @inheritDoc
     */
    public function remove(SearchableInterface $object): bool
    {
        if (false === $this->supports($object->getName())) {
            throw new UnsupportedIndexException($this, $object->getName());
        }

        return $this->indexStorage->getIndex($object->getName())->remove($object);
    }

    /**
     * @inheritDoc
     */
    public function supports(string $name): bool
    {
        return $this->indexStorage->offsetExists($name);
    }

    /**
     * @inheritDoc
     */
    public function update(SearchableInterface $object): bool
    {
        if (false === $this->supports($object->getName())) {
            throw new UnsupportedIndexException($this, $object->getName());
        }

        return $this->indexStorage->getIndex($object->getName())->update($object);
    }
}