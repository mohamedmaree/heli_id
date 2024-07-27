<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fqs')->insert([
            [
                'question'       => json_encode(['ar' => 'تقديم تجربة ذات طابع شخصي لك:', 'en' => 'Providing you with a personalized experience:' ], JSON_UNESCAPED_UNICODE) ,
                'answer'         => json_encode(['ar' => 'تختلف تجربتك على فيسبوك عن تجربة أي شخص آخر: بدءًا من المنشورات والقصص والمناسبات والإعلانات وغيرها من أنواع المحتوى الأخرى التي تظهر لك في آخر الأخبار أو منصة الفيديو التي نوفرها، إلى الصفحات التي تتابعها والميزات الأخرى التي قد تستخدمها، مثل الموضوعات الرائجة وMarketplace والبحث. ونستخدم البيانات المتوفرة لدينا، مثل تلك المتعلقة بعمليات التواصل التي تقوم بها والاختيارات والإعدادات التي تحددها والعناصر التي تقوم بمشاركتها والإجراءات التي تتخذها داخل منتجاتنا وخارجها، لإضفاء طابع شخصي على تجربتك.' , 'en' => 'Your experience on Facebook is different from everyone elses: from the posts, stories, events, ads, and other types of content you see in your News Feed or our video platform, to the Pages you follow and other features you might use, like Trends, Marketplace, and search. We use the data we have, such as about your communications, choices and settings you make, what you share, and actions you take on and off our Products, to personalize your experience.' ], JSON_UNESCAPED_UNICODE) ,
            ] , [
                'question'       => json_encode(['ar' => 'توفير إمكانية التواصل مع الأشخاص والمؤسسات التي تهتم بها', 'en' => 'Providing the ability to communicate with the people and organizations you are interested in' ], JSON_UNESCAPED_UNICODE) ,
                'answer'         => json_encode(['ar' => 'نساعدك في العثور على الأشخاص والمجموعات والأنشطة التجارية والمؤسسات وغيرها مما يقع ضمن دائرة اهتماماتك والتواصل معها عبر منتجات فيسبوك التي تستخدمها. ونستخدم البيانات التي نحصل عليها لتقديم اقتراحات لك وللآخرين، على سبيل المثال، مجموعات للانضمام إليها، ومناسبات لحضورها، وصفحات لمتابعتها أو مراسلتها، وعروض لمشاهدتها، وأشخاص قد ترغب في أن تصبح صديقًا لهم. وتُعد الروابط القوية أساسًا مهمًا لبناء مجتمعات أفضل، ونحن على يقين أن خدماتنا تصبح أكثر فائدة عندما يتواصل الأشخاص معًا ومع المجموعات والمؤسسات التي يهتمون بها.' , 'en' =>  'We help you find and connect with people, groups, businesses, organizations and more that interest you through the Facebook products you use. We use the data we obtain to make suggestions to you and others, for example, groups to join, events to attend, pages to follow or message with, offers to watch, and people you might want to become friends with. Strong connections are an important foundation for building better communities, and we know that our services become even more useful when people connect with each other and with the groups and organizations they care about.' ], JSON_UNESCAPED_UNICODE) ,
            ],[
                'question'       => json_encode(['ar' => 'تشجيعك على التعبير عن نفسك والتواصل بشأن ما يهمّك:', 'en' => 'Encouraging you to express yourself and communicate what matters to you:' ], JSON_UNESCAPED_UNICODE) ,
                'answer'         => json_encode(['ar' => 'نوفر لك العديد من الطرق للتعبير عن نفسك على فيسبوك والتواصل مع الأصدقاء وأفراد العائلة والأشخاص الآخرين بخصوص الأمور التي تهتم بها، على سبيل المثال، مشاركة تحديثات الحالة والصور ومقاطع الفيديو والقصص عبر منتجات فيسبوك التي تستخدمها، أو إرسال الرسائل إلى صديق أو عدة أشخاص، أو إنشاء مناسبات أو مجموعات، أو إضافة محتوى إلى ملفك الشخصي. ولقد قمنا أيضًا بتطوير، ولا نزال نكتشف، وسائل جديدة تتيح للأشخاص إمكانية استخدام التكنولوجيا، مثل الواقع المعزَّز والفيديو بتقنية 360 درجة لإنشاء المزيد من عناصر المحتوى الجاذبة للانتباه والتي تشجع على التفاعل ومشاركتها على فيسبوك', 'en' => 'We offer many ways for you to express yourself on Facebook and communicate with friends, family, and other people about things you care about, for example, sharing status updates, photos, videos, and stories across the Facebook Products you use, sending messages to a friend or multiple people, or Create events or groups, or add content to your profile. We have also developed, and continue to discover, new ways for people to use technology, such as augmented reality and 360-degree video to create more engaging, engaging content on Facebook.' ], JSON_UNESCAPED_UNICODE) ,
            ],[
                'question'       => json_encode(['ar' => 'مساعدتك في اكتشاف المحتوى والمنتجات والخدمات التي قد تهتم بها:', 'en' => 'Helping you discover content, products and services you may be interested in:' ], JSON_UNESCAPED_UNICODE) ,
                'answer'         => json_encode(['ar' => 'نعرض عليك الإعلانات والعروض وغيرها من أنواع المحتوى المُموَّل لمساعدتك في التعرف على عناصر المحتوى والمنتجات والخدمات التي تقدمها العديد من الأنشطة التجارية والمؤسسات التي تستخدم فيسبوك ومنتجات فيسبوك الأخرى. يشرح القسم 2 أدناه هذا الأمر بمزيد من التفصيل.', 'en' => 'We show you ads, offers, and other types of sponsored content to help you learn about content, products, and services offered by the many businesses and organizations that use Facebook and other Facebook products. Section 2 below explains this in more detail.' ], JSON_UNESCAPED_UNICODE) ,
            ] ,[
                'question'       => json_encode(['ar' => 'مواجهة السلوكيات الضارة وحماية ودعم مجتمعنا:', 'en' => 'Confront harmful behavior and protect and support our community:' ], JSON_UNESCAPED_UNICODE) ,
                'answer'         => json_encode(['ar' => 'لن يتمكن الأشخاص من بناء مجتمع على فيسبوك إلا عند الشعور بالأمان. ولذا نحرص على توظيف فرق عمل مخصصة من جميع أنحاء العالم بالإضافة إلى تطوير أنظمة تقنية متقدمة لاكتشاف حالات إساءة استخدام منتجاتنا والسلوكيات الضارة تجاه الآخرين والمواقف التي يمكننا تقديم المساعدة خلالها تجاه دعم وحماية مجتمعنا. فإذا نما إلى علمنا وجود مثل هذا المحتوى أو السلوك، فسنتخذ الإجراء المناسب، على سبيل المثال، عرض تقديم مساعدة، أو إزالة المحتوى، أو إزالة أو حجب الوصول إلى ميزات محددة، أو تعطيل الحساب، أو التواصل مع جهات تنفيذ القانون.', 'en' => 'People will only be able to build a community on Facebook when they feel safe. That is why we employ dedicated teams from around the world and develop advanced technology systems to detect misuse of our products, harmful behavior towards others, and situations in which we can help support and protect our community. If we become aware of such content or behavior, we will take appropriate action, for example, offering to provide assistance, removing content, removing or blocking access to certain features, disabling the account, or communicating with law enforcement.' ], JSON_UNESCAPED_UNICODE) ,
        
            ]
        ]);
    }
}
