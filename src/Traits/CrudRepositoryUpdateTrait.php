<?php

namespace ZnCore\Repository\Traits;

use ZnCore\Domain\Enums\EventEnum;
use ZnCore\Entity\Interfaces\EntityIdInterface;
use ZnCore\Validation\Helpers\ValidationHelper;

trait CrudRepositoryUpdateTrait
{

    abstract protected function updateQuery($id, array $data): void;

    public function update(EntityIdInterface $entity)
    {
        ValidationHelper::validateEntity($entity);
        $this->findOneById($entity->getId());
        $event = $this->dispatchEntityEvent($entity, EventEnum::BEFORE_UPDATE_ENTITY);
        $data = $this->mapperEncodeEntity($entity);
        $this->updateQuery($entity->getId(), $data);
        $event = $this->dispatchEntityEvent($entity, EventEnum::AFTER_UPDATE_ENTITY);
    }
}
