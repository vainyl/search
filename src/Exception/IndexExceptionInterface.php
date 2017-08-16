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

use Vainyl\Core\Exception\CoreExceptionInterface;
use Vainyl\Search\IndexInterface;

/**
 * Interface IndexExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface IndexExceptionInterface extends CoreExceptionInterface
{
    /**
     * @return IndexInterface
     */
    public function getIndex() : IndexInterface;
}