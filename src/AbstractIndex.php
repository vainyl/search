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

namespace Vainyl\Search;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Domain\Storage\DomainStorageInterface;
use Vainyl\Search\Exception\UnsupportedIndexException;

/**
 * Class AbstractIndex
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractIndex extends AbstractIdentifiable implements IndexInterface
{
    private $domainStorage;

    /**
     * AbstractIndex constructor.
     *
     * @param DomainStorageInterface $domainStorage
     */
    public function __construct(DomainStorageInterface $domainStorage)
    {
        $this->domainStorage = $domainStorage;
    }

    /**
     * @inheritDoc
     */
    public function add(SearchableInterface $object): bool
    {
        if (false === $this->supports($object->getName())) {
            throw new UnsupportedIndexException($this, $object->getName());
        }

        return $this->doAdd($object);
    }

    /**
     * @param SearchableInterface $object
     *
     * @return bool
     */
    abstract public function doAdd(SearchableInterface $object): bool;

    /**
     * @param FilterInterface $filter
     *
     * @return null|string
     */
    abstract public function doFindId(FilterInterface $filter): ?string;

    /**
     * @param FilterInterface $filter
     *
     * @return array
     */
    abstract public function doFindIds(FilterInterface $filter): array;

    /**
     * @param SearchableInterface $object
     *
     * @return bool
     */
    abstract public function doRemove(SearchableInterface $object): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    abstract public function doSupports(string $name): bool;

    /**
     * @param SearchableInterface $object
     *
     * @return bool
     */
    abstract public function doUpdate(SearchableInterface $object): bool;

    /**
     * @inheritDoc
     */
    public function find(FilterInterface $filter): array
    {
        if ([] === ($ids = $this->doFindIds($filter))) {
            return [];
        }

        return $this->domainStorage->findMany($filter->getName(), ['id' => $ids]);
    }

    /**
     * @inheritDoc
     */
    public function findOne(FilterInterface $filter): SearchableInterface
    {
        if (null === ($id = $this->doFindId($filter))) {
            return null;
        }

        return $this->domainStorage->findById($filter->getName(), $id);
    }

    /**
     * @inheritDoc
     */
    public function remove(SearchableInterface $object): bool
    {
        if (false === $this->supports($object->getName())) {
            throw new UnsupportedIndexException($this, $object->getName());
        }

        return $this->doRemove($object);
    }

    /**
     * @inheritDoc
     */
    public function supports(string $name): bool
    {
        return $this->doSupports($name) && $this->domainStorage->supports($name);
    }

    /**
     * @inheritDoc
     */
    public function update(SearchableInterface $object): bool
    {
        if (false === $this->supports($object->getName())) {
            throw new UnsupportedIndexException($this, $object->getName());
        }

        return $this->doUpdate($object);
    }
}