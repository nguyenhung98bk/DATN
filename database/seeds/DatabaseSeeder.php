<?php

use Illuminate\Database\Seeder;
use App\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GiaovienTableSeeder::class);
        $this->call(HocsinhTableSeeder::class);
        $this->call(MonhocTableSeeder::class);
        $this->call(CauhoiTableSeeder::class);
        $this->call(DapanTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $fake = Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
                [
                    'name' => $fake->name,
                    'email' => $fake->unique()->email,
                    'password' => bcrypt('123456'),
                    'phanloai' => '1',
                    'trangthai' => '0',
                ]
            ]);
        }
        for ($i = 0; $i < 200; $i++) {
            DB::table('users')->insert([
                [
                    'name' => $fake->name,
                    'email' => $fake->unique()->email,
                    'password' => bcrypt('123456'),
                    'phanloai' => '2',
                    'trangthai' => '0',
                ]
            ]);
        }
        DB::table('users')->insert([
            [
                'name' => 'Admin 1',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('123456'),
                'phanloai' => '0',
                'trangthai' => '0',
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('123456'),
                'phanloai' => '0',
                'trangthai' => '0',
            ],
        ]);
    }
}

class GiaovienTableSeeder extends Seeder
{
    public function run()
    {
        $fake = Faker\Factory::create();
        $User = Users::where('phanloai', '1')->get();
        foreach ($User as $value) {
            DB::table('giaovien')->insert([
                'ten' => $value->name,
                'ngaysinh' => $fake->date("Y-m-d"),
                'id_user' => $value->id,
            ]);
        }
    }
}

class HocsinhTableSeeder extends Seeder
{
    public function run()
    {
        $fake = Faker\Factory::create();
        $User = Users::where('phanloai', '2')->get();
        foreach ($User as $value) {
            DB::table('hocsinh')->insert([
                'ten' => $value->name,
                'ngaysinh' => $fake->date("Y-m-d"),
                'lop' => random_int(10, 12) . 'A' . random_int(1, 10),
                'id_user' => $value->id,
            ]);
        }
    }
}

class MonhocTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 10; $i < 13; $i++) {
            DB::table('monhoc')->insert([
                ['tenmonhoc' => 'Địa lý lớp ' . $i],
                ['tenmonhoc' => 'Lịch sử lớp ' . $i],
                ['tenmonhoc' => 'Văn học lớp ' . $i],
            ]);
        }
    }
}

class CauhoiTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cauhoi')->insert([
            [
                'id_monhoc' => '1',
                'noidung' => 'Mặt phẳng chiếu đồ thường có dạng hình học là',
                'mucdo' => '1',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Cơ sở phân chia thành các loại phép chiếu: phương vị, hình nón, hình trụ là',
                'mucdo' => '1',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Cơ sở để phân chia mỗi phép chiếu thành 3 loại: đứng, ngang, nghiêng là',
                'mucdo' => '1',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu phương vị sử dụng mặt chiếu đồ là:',
                'mucdo' => '1',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Trong phép chiếu phương vị đứng mặt chiếu tiếp xúc với địa cầu ở vị trí:',
                'mucdo' => '1',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Để vẽ bản đồ vùng quanh cực người ta dùng phép chiếu',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu hình nón đứng có đặc điểm lưới chiếu',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu hình trụ đứng có đặc điểm lưới chiếu:',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu bản đồ thế giới người ta dùng phép chiếu',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu hình bản đồ là',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu hình trụ đứng có độ chính xác ở vùng',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu phương vị đứng có đặc điểm lưới chiếu',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu phương vị ngang có đặc điểm lưới chiếu',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Một trong những căn cứ rất quan trọng để xác định phương hướng trên bản đồ là dựa vào',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Tính chính xác trong phép chiếu phương vị đứng có đặc điểm nào dưới đây?',
                'mucdo' => '2',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Tính chính xác trong phép chiếu phương vị ngang có đặc điểm',
                'mucdo' => '3',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu phương vị ngang thường được dùng để vẻ bản đồ ở khu vực nào dưới đây?',
                'mucdo' => '3',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Phép chiếu phương vị nghieng thường được dùng để vẻ bản đồ',
                'mucdo' => '3',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Khi muốn thể hiện những phần lãnh thổ nằm ở vĩ độ trung bình với độ chính xác cao người ta không dùng phép chiếu nào dưới đây?',
                'mucdo' => '3',
                'trangthai' => '1',
            ],
            [
                'id_monhoc' => '1',
                'noidung' => 'Khi muốn thể hiện những phần lãnh thổ nằm ở vùng cực với độ chính xác cao người ta thường dùng phép chiếu nào dưới đây?',
                'mucdo' => '3',
                'trangthai' => '1',
            ],
        ]);
    }
}
class DapanTableSeeder extends Seeder{
    public function run(){
        DB::table('dapan')->insert([
            [
                'id_cauhoi'=>'1',
                'noidung'=>'Hình nón',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'1',
                'noidung'=>'Hình trụ',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'1',
                'noidung'=>'Mặt phẳng',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'1',
                'noidung'=>'Mặt nghiêng',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'2',
                'noidung'=>'Do vị trí lãnh thổ cần thể hiện',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'2',
                'noidung'=>'Do hình dạng mặt chiếu',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'2',
                'noidung'=>'Do vị trí tiếp xúc mặt chiếu',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'2',
                'noidung'=>'Do đặc điểm lưới chiếu',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'3',
                'noidung'=>'Cơ sở để phân chia mỗi phép chiếu thành 3 loại: đứng, ngang, nghiêng là',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'3',
                'noidung'=>'Do hình dạng mặt chiếu',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'3',
                'noidung'=>'Do vị trí lãnh thổ cần thể hiện',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'3',
                'noidung'=>'Do đặc điểm lưới chiếu',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'4',
                'noidung'=>'Hình nón.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'4',
                'noidung'=>'Mặt phẳng.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'4',
                'noidung'=>'Hình trụ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'4',
                'noidung'=>'Hình lục lăng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'5',
                'noidung'=>'Cực.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'5',
                'noidung'=>'Vòng cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'5',
                'noidung'=>'Chí tuyến.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'5',
                'noidung'=>'Xích đạo.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'6',
                'noidung'=>'Phương vị ngang.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'6',
                'noidung'=>'Phương vị đứng.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'6',
                'noidung'=>'Hình nón đứng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'6',
                'noidung'=>'Hình nón ngang.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'7',
                'noidung'=>'Vĩ tuyến là những cung tròn, kinh tuyến là những đường thẳng đồng quy ở cực',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'7',
                'noidung'=>'Vĩ tuyến là những cung tròn đồng tâm, kinh tuyến là những đoạn thẳng đồng quy ở cực',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'7',
                'noidung'=>'Vĩ tuyến là những vòng tròn đồng tâm, kinh tuyến là những đường thẳng',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'7',
                'noidung'=>'Vĩ tuyến là những vòng tròn, kinh tuyến là những đường thẳng đồng quy ở cực',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'8',
                'noidung'=>'Vĩ tuyến, kinh tuyến là những đường thẳng song song.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'8',
                'noidung'=>'Vĩ tuyến, kinh tuyến là những đường thẳng song song và chúng thẳng góc với nhau.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'8',
                'noidung'=>'Vĩ tuyến, kinh tuyến là những đường cong về phía hai cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'8',
                'noidung'=>'Vĩ tuyến, kinh tuyến là những đường cong về phía hai cực và vuông góc với nhau.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'9',
                'noidung'=>'Hình trụ đứng.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'9',
                'noidung'=>'Hình nón đứng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'9',
                'noidung'=>'Phương vị đứng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'9',
                'noidung'=>'Hình nón ngang.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'10',
                'noidung'=>'Biểu thị mặt cong lên một mặt phẳng của giấy vẽ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'10',
                'noidung'=>'Biểu thị mặt cong của Trái Đất lên một mặt phẳng giấy vẽ.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'10',
                'noidung'=>'Biểu thị mặt phẳng lên một mặt phẳng của giấy vẽ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'10',
                'noidung'=>'Biểu thị mặt phẳng lên một mặt cong của giấy vẽ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'11',
                'noidung'=>'Xích đạo.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'11',
                'noidung'=>'Vĩ độ trung bình.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'11',
                'noidung'=>'Vĩ độ cao.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'11',
                'noidung'=>'Vùng cực, cận cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'12',
                'noidung'=>'Vĩ tuyến là những vòng tròn đồng tâm, kinh tuyến là những đường thẳng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'12',
                'noidung'=>'Vĩ tuyến là những vòng tròn đồng tâm, kinh tuyến là những đường thẳng đồng quy ở cực.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'12',
                'noidung'=>'Vĩ tuyến là những cung tròn đồng tâm, kinh tuyến là đường thẳng đồng quy ở cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'12',
                'noidung'=>'Vĩ tuyến là những cung tròn đồng tâm, kinh tuyến là đường cong đồng quy ở cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'13',
                'noidung'=>'Xích đạo và kinh tuyến giữa là đường thẳng, những kinh tuyến còn lại là những đường cong đối xứng nhau qua kinh tuyến giữa, vĩ tuyến còn lại là cung tròn đối xứng nhau qua xích đạo.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'13',
                'noidung'=>'Vĩ tuyến là những đường thẳng song song và chúng vuông góc với nhau, kinh tuyến là những đường cong đối xứng nhau qua kinh tuyến giữa.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'13',
                'noidung'=>'Vĩ tuyến là những vòng tròn đồng tâm còn xích đạo và kinh tuyến giữa là đường thẳng, những kinh tuyến còn lại là những đường cong đối xứng nhau qua kinh tuyến giữa.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'13',
                'noidung'=>'Xích đạo và kinh tuyến giữa là đường thẳng, những kinh tuyến còn lại là những đường cong đối xứng nhau qua kinh tuyến giữa. Vĩ tuyến là những vòng tròn đồng tâm.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'14',
                'noidung'=>'Mạng lưới kinh vĩ tuyến thể hiện trên bản đồ.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'14',
                'noidung'=>'Hình dáng lãnh thổ thể hiện trên bản đồ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'14',
                'noidung'=>'Vị trí địa lí của lãnh thổ thể hiện trên bản đồ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'14',
                'noidung'=>'Bảng chú giải, hình dạng lãnh thổ.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'15',
                'noidung'=>'Tăng dần từ vĩ độ thấp lên vĩ độ cao.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'15',
                'noidung'=>'Cao ở vòng cực và giảm dần về 2 phía.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'15',
                'noidung'=>'Cao ở 2 cực và giảm dần về các vĩ độ thấp hơn.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'15',
                'noidung'=>'Không đổi trên toàn bộ lãnh thổ thể hiện.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'16',
                'noidung'=>'Cao ở xích đạo và giảm dần về 2 nữa cầu Bắc – Nam.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'16',
                'noidung'=>'Cao ở kinh tuyến giữa và giảm dần về 2 phía Đông – Tây.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'16',
                'noidung'=>'Cao ở vị trí giao của kinh tuyến giữa và xích đạo, giảm dần khi càng xa giao điểm đó.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'16',
                'noidung'=>'Cao ở vị trí giao của kinh tuyến gốc và xích đạo, giảm dần khi càng xa giao điểm đó.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'17',
                'noidung'=>'Bán cầu Đông và bán cầu Tây.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'17',
                'noidung'=>'Bán cầu Bắc và bán cầu Nam.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'17',
                'noidung'=>'Vùng cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'17',
                'noidung'=>'Vùng vĩ độ trung bình.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'18',
                'noidung'=>'Bán cầu Đông và bán cầu Tây.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'18',
                'noidung'=>'Bán cầu Bắc và bán cầu Nam.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'18',
                'noidung'=>'Vùng cực.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'18',
                'noidung'=>'Vùng vĩ độ trung bình.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'19',
                'noidung'=>'Phương vị nghiêng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'19',
                'noidung'=>'Hình nón nghiêng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'19',
                'noidung'=>'Hình trụ nghiêng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'19',
                'noidung'=>'Phương vị đứng.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'20',
                'noidung'=>'Phương vị đứng.',
                'dungsai'=>'1',
            ],
            [
                'id_cauhoi'=>'20',
                'noidung'=>'Phương vị ngang.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'20',
                'noidung'=>'Hình nón đứng.',
                'dungsai'=>'0',
            ],
            [
                'id_cauhoi'=>'20',
                'noidung'=>'Hình trụ đứng.',
                'dungsai'=>'0',
            ],
        ]);
    }
}
