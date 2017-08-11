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

use Vainyl\Core\IdentifiableInterface;
use Vainyl\Search\IndexInterface;

/**
 * Interface IndexStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface IndexStorageInterface extends IdentifiableInterface
{
    /**
     * @param IndexInterface $index
     *
     * @return IndexStorageInterface
     */
    public function addIndex(IndexInterface $index): IndexStorageInterface;

    /**
     * @param string $name
     *
     * @return IndexInterface
     */
    public function getIndex(string $name): IndexInterface;
}