<?php

namespace App\Services;

use App\Repositories\Eloquent\BaseRepository;
use Exception as ExceptionAlias;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    /**
     * @var BaseRepository
     */
    public BaseRepository $repository;
    /**
     * BaseService constructor.
     *
     * @param BaseRepository $repository
     */
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @param array|string $columns
     * @param array|null $with
     * @param array|string|null $withCount
     * @return Model
     */
    public function find(int $id, array|string $columns = ['*'], array $with = null, array|string|null $withCount = null): Model
    {
        return $this->repository->find($id, $columns, $with, $withCount);
    }

    // find by column

    /**
     * @param array|string $columns
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws ExceptionAlias
     */
    public function findBy(array|string $columns): \Illuminate\Database\Eloquent\Builder
    {
        return $this->repository->queryDefault($columns, null, null);
    }


    /**
     * @param array $data
     * @param int $id
     * @return bool
     * @throws ExceptionAlias
     */
    public function update(array $data, int $id): bool
    {
        return $this->repository->update($data, $id);
    }
    /**
     * @param int $id
     *
     * @return Model
     * @throws ExceptionAlias
     */
    public function delete(int $id): Model
    {
        return $this->repository->delete($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    /**
     * @throws ExceptionAlias
     */
    public function pagination(array $requester = [], array $columnCanSearchKeyword = ['*'], int $limit = 20): array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->repository->pagination(limit: $limit, requester: $requester, columnCanSearchKeyword: $columnCanSearchKeyword);
    }

    /**
     * @throws ExceptionAlias
     */
    public function withCount($requester = [], $columnCanSearchKeyword = ['*']): int
    {
        return $this->repository->withCount($requester, $columnCanSearchKeyword);
    }

    /**
     * @return Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->all();
    }

    /**
     * @return Model
     */
    public function first(): Model
    {
        return $this->repository->first();
    }

    /**
     * @param array $data
     * @return Model
     */

    public function findByField(array $where, array $columns = ['*'], array|string|null $with = null, array|string|null $withCount = null): Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return $this->repository->findByField($where, $columns, $with, $withCount);
    }

    /**
     * @param string $slug
     * @param array|null $with
     * @return Model
     */
    public function findBySlug(string $slug, array|null $with): Model
    {
        return $this->repository->findBySlug($slug, $with);
    }

    public function search(array $requester = [], array $columnCanSearchKeyword = ['*'])
    {
        return $this->repository->search($requester, $columnCanSearchKeyword);
    }
}
