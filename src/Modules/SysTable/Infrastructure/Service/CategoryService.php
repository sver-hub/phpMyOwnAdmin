<?php


namespace src\Modules\SysTable\Infrastructure\Service;


use src\Modules\SysTable\Domain\Entity\SysCategory;
use src\Modules\SysTable\Domain\Entity\SysTableSysCategory;
use src\Modules\SysTable\Domain\Repository\SysCategoryRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableSysCategoryRepositoryInterface;

class CategoryService
{
    private $sysTableRepository;
    private $sysCategoryRepository;
    private $sysTableSysCategoryRepository;

    public function __construct(SysTableRepositoryInterface $sysTableRepository,
                                SysCategoryRepositoryInterface $sysCategoryRepository,
                                SysTableSysCategoryRepositoryInterface $sysTableSysCategoryRepository)
    {
        $this->sysTableRepository = $sysTableRepository;
        $this->sysCategoryRepository = $sysCategoryRepository;
        $this->sysTableSysCategoryRepository = $sysTableSysCategoryRepository;
    }

    public function getAllCategoriesWithContent()
    {
        $content = [];
        $categories = $this->sysCategoryRepository->findAll();
        foreach ($categories as $category) {
            $children = $this->sysTableRepository->findAllByCategoryId($category->id);
            $content[$category->category_name] = [];
            if ($children != null) {
                foreach ($children as $child) {
                    $content[$category->category_name][] = ['id' => $child->id, 'title' => $child->title];
                }
            }
        }

        return $content;
    }

    public function addTableToCategory($tableId, $categoryId)
    {
        $connection = new SysTableSysCategory();
        $connection->sys_table_id = $tableId;
        $connection->sys_category_id = $categoryId;
        $this->sysTableSysCategoryRepository->insert($connection);
    }

    public function addCategory($categoryName)
    {
        $category = new SysCategory();
        $category->category_name = $categoryName;
        $this->sysCategoryRepository->save($category);
    }

    public function removeTableFromCategory($tableId, $categoryId)
    {
        $connection = new SysTableSysCategory();
        $connection->sys_table_id = $tableId;
        $connection->sys_category_id = $categoryId;
        $this->sysTableSysCategoryRepository->remove($connection);
    }

    public function getCategories($id)
    {
        $connections = $this->sysTableSysCategoryRepository->findAllCategoriesByTableId($id);
        $ids = array_map(function ($connection) {
            return $connection->sys_category_id;
        }, $connections);

        $categories = $this->sysCategoryRepository->findAll();
        $thisCategories = [];
        $availableCategories = [];
        foreach ($categories as $category) {
            if (in_array($category->id, $ids)) {
                $thisCategories[] = $category;
            } else {
                $availableCategories[] = $category;
            }
        }

        return ['thisCategories' => $thisCategories, 'availableCategories' => $availableCategories];
    }
}