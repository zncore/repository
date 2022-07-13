<?php

namespace ZnCore\Repository\Interfaces;

use ZnCore\Domain\Interfaces\GetEntityClassInterface;
use ZnCore\Domain\Interfaces\ReadAllInterface;

interface CrudRepositoryInterface extends RepositoryInterface, GetEntityClassInterface, ReadAllInterface, FindOneInterface, ModifyInterface//, RelationConfigInterface
{

}
