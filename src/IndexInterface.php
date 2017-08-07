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
     * @param IdentifiableInterface $identifiable
     *
     * @return bool
     */
    public function add(IdentifiableInterface $identifiable): bool;

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
     * @return IdentifiableInterface
     */
    public function finOne(FilterInterface $filter): IdentifiableInterface;

    /**
     * @param FilterInterface $filter
     *
     * @return array
     */
    public function find(FilterInterface $filter): array;

    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return bool
     */
    public function remove(IdentifiableInterface $identifiable): bool;

    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return bool
     */
    public function supports(IdentifiableInterface $identifiable): bool;

    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return bool
     */
    public function update(IdentifiableInterface $identifiable): bool;
}