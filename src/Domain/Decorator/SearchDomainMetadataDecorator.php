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

namespace Vainyl\Search\Domain\Decorator;

use Vainyl\Domain\Metadata\Decorator\AbstractDomainMetadataDecorator;

/**
 * Class SearchDomainMetadataDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SearchDomainMetadataDecorator extends AbstractDomainMetadataDecorator
{
    private $search;

    /**
     * @return array
     */
    public function getSearch(): array
    {
        return $this->search;
    }

    /**
     * @param array $search
     *
     * @return SearchDomainMetadataDecorator
     */
    public function setSearch(array $search): SearchDomainMetadataDecorator
    {
        $this->search = $search;

        return $this;
    }
}