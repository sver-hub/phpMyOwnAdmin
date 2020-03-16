<?php


namespace src\Modules\SysTable\Infrastructure\Service;


use src\Modules\SysTable\Domain\Repository\SysCategoryRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;

class CategoryService
{
    private $sysTableRepository;
    private $sysCategoryRepository;

    public function __construct(SysTableRepositoryInterface $sysTableRepository,
                                SysCategoryRepositoryInterface $sysCategoryRepository)
    {
        $this->sysTableRepository = $sysTableRepository;
        $this->sysCategoryRepository = $sysCategoryRepository;
    }

    public function getAllCategoriesWithContent()
    {
        $content = [];
        $categories = $this->sysCategoryRepository->findAll();
        foreach ($categories as $category) {
            $children = $this->sysTableRepository->findAllByCategoryId($category->id);
            $content[$category->category_name] = [];
            foreach ($children as $child) {
                $content[$category->category_name][] = ['id' => $child->id, 'title' => $child->title];
            }
        }

        return $content;
    }
}