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

use Vainyl\Domain\Metadata\Decorator\AbstractDomainMetadataFactoryDecorator;
use Vainyl\Domain\Metadata\DomainMetadataInterface;

/**
 * Class SearchDomainMetadataFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SearchDomainMetadataFactoryDecorator extends AbstractDomainMetadataFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function create(): DomainMetadataInterface
    {
        return new SearchDomainMetadataDecorator(parent::create());
    }
}