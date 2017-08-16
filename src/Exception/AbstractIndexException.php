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

use Vainyl\Core\Exception\AbstractCoreException;
use Vainyl\Search\IndexInterface;

/**
 * Class AbstractIndexException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractIndexException extends AbstractCoreException implements IndexExceptionInterface
{
    private $index;

    /**
     * AbstractIndexException constructor.
     *
     * @param IndexInterface  $index
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct(IndexInterface $index, string $message, int $code = 500, \Throwable $previous = null)
    {
        $this->index = $index;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getIndex(): IndexInterface
    {
        return $this->index;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['index' => $this->index->getId()], parent::toArray());
    }
}