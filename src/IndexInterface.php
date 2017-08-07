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

use Vainyl\Core\NameableInterface;

/**
 * Interface IndexInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface IndexInterface extends NameableInterface
{
    /**
     * @param SearchableInterface $object
     *
     * @return bool
     */
    public function add(SearchableInterface $object): bool;

    /**
     * @return bool
     */
    public function clear(): bool;

    /**
     * @return bool
     */
    public function create(): bool;

    /**
     * @param FilterInterface $filter
     *
     * @return null|SearchableInterface
     */
    public function findOne(FilterInterface $filter): ?SearchableInterface;

    /**
     * @param FilterInterface $filter
     *
     * @return array
     */
    public function find(FilterInterface $filter): array;

    /**
     * @param SearchableInterface $object
     *
     * @return bool
     */
    public function remove(SearchableInterface $object): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function supports(string $name): bool;

    /**
     * @param SearchableInterface $object
     *
     * @return bool
     */
    public function update(SearchableInterface $object): bool;
}