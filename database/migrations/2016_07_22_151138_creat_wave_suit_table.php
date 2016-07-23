<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatWaveSuitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wave_suits', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('explain');
            $table->string('defender');

            $table->string('status_inner');
            $table->string('status_show');

            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('wave_suits')->insert([
                'title' => '코웨이 중금속 검출사건',
                'explain' => "
<p>가. 코웨이는 현재 자사 정수기의 니켈 성분 검출에 대하여 사죄의 뜻을 표하며, 사용기간 중 렌탈료의 환불 및 제품 무상 교환조치를 제시하였습니다.</p>
<p>나. 그러나 위 조치만으로 소비자들의 손해가 전보되지 아니함은 자명하다 할 것입니다. 특히 ① 계약자 본인 및 가족의 정신적 고통에 대한 위자료의 청구 및 ② 니켈 흡수와 상당인과관계가 있는 상해에 대한 치료비의 청구, ③ 장래의 정기 건강검진 비용에 대한 청구 등이 필요하다 할 것입니다.</p>
<p>다. 소송기간은 최소 1년 6월, 최대 3년이 예상되오나, 소송 중 조정, 화해가 이루어지는 경우 위 기간은 단축될 수 있습니다.</p>
                ",
                'defender' => '코웨이 주식회사',
                'status_inner' => '접수중',
                'status_show' => '접수중',
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wave_suits');
    }
}
