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

use Vainyl\Core\IdentifiableInterface;

/**
 * Interface IndexInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface IndexInterface extends IdentifiableInterface
{
    /**
     * @param SearchableInterface $searchable
     *
     * @return bool
     */
    public function add(SearchableInterface $searchable): bool;

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
     * @return SearchableInterface
     */
    public function finOne(FilterInterface $filter): SearchableInterface;

    /**
     * @param FilterInterface $filter
     *
     * @return array
     */
    public function find(FilterInterface $filter): array;

    /**
     * @param SearchableInterface $searchable
     *
     * @return bool
     */
    public function remove(SearchableInterface $searchable): bool;

    /**
     * @param SearchableInterface $searchable
     *
     * @return bool
     */
    public function supports(SearchableInterface $searchable): bool;

    /**
     * @param SearchableInterface $searchable
     *
     * @return bool
     */
    public function update(SearchableInterface $searchable): bool;
}