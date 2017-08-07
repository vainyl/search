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
}