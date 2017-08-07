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

namespace Vainyl\Search\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vainyl\Core\Exception\MissingRequiredServiceException;
use Vainyl\Core\Extension\AbstractExtension;
use Vainyl\Core\Extension\AbstractFrameworkExtension;

/**
 * Class SearchExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SearchExtension extends AbstractFrameworkExtension
{
    /**
     * @inheritDoc
     */
    public function getCompilerPasses(): array
    {
        return [new IndexCompilerPass()];
    }

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): AbstractExtension
    {
        parent::load($configs, $container);

        if (false === $container->hasDefinition('search.index.proxy')) {
            throw new MissingRequiredServiceException($container, 'search.index.proxy');
        }

        $configuration = new SearchConfiguration();
        $searchConfig = $this->processConfiguration($configuration, $configs);
        $container->setAlias('search.index', 'search.index.' . $searchConfig['engine']);

        return $this;
    }
}