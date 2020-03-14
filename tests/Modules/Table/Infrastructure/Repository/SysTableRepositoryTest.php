<?php


namespace Modules\Table\Infrastructure\Repository;


use Codeception\Test\Unit;
use common\fixtures\TableRepositoryFixture;
use Yii;

class SysTableRepositoryTest extends Unit
{
    private $sysTableRepository;

    public function _inject()
    {
        $this->sysTableRepository = Yii::createObject('SysTableRepository');
    }

    public function _fixtures()
    {
        return [
            'sys_table' => [
                'class' => TableRepositoryFixture::class,
                'dataFile' => '@common/tests/_data/sysTableRepository.php'
            ]
        ];
    }

    public function testFindById()
    {
        $id = 1;
        $result = $this->sysTableRepository->findById($id);

        $this->assertEquals($id, $result->id);
    }
}