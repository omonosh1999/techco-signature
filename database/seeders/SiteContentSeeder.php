<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use App\Models\SiteItem;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->content();
        $this->items();

        SiteContent::flush();
        SiteItem::flush();
    }

    /**
     * Single editable strings. Keys are prefixed with the page they belong to
     * so the admin screen can group them; `global` strings appear everywhere.
     */
    private function content(): void
    {
        $fields = [
            // ─── Global ───────────────────────────────────────────────────
            ['global.brand.name', 'global', 'brand', 'Company name', 'text', 'TechCo Signature'],
            ['global.brand.tagline', 'global', 'brand', 'Tagline', 'text', 'Brands built to be believed.'],

            ['global.nav.home', 'global', 'nav', 'Menu — home', 'text', 'Agency'],
            ['global.nav.work', 'global', 'nav', 'Menu — what we do', 'text', 'What we do'],
            ['global.nav.recruitment', 'global', 'nav', 'Menu — recruitment', 'text', 'Recruitment'],
            ['global.nav.school', 'global', 'nav', 'Menu — school', 'text', 'Branding School'],
            ['global.nav.login', 'global', 'nav', 'Log in button', 'text', 'Log in'],
            ['global.nav.signup', 'global', 'nav', 'Sign up button', 'text', 'Get started'],

            ['global.contact.email', 'global', 'contact', 'Email address', 'text', 'techco979@gmail.com'],
            ['global.contact.phone', 'global', 'contact', 'Phone / WhatsApp', 'text', '+234 704 484 0134'],
            ['global.contact.address', 'global', 'contact', 'Address', 'text', 'Abuja, Federal Capital Territory, Nigeria'],
            ['global.contact.hours', 'global', 'contact', 'Office hours', 'text', 'Monday to Friday, 9:00am – 5:00pm WAT'],
            ['global.contact.rc', 'global', 'contact', 'RC number', 'text', 'RC 9592495'],
            ['global.contact.tin', 'global', 'contact', 'Tax Identification Number', 'text', 'TIN 2623700950121'],
            ['global.footer.note', 'global', 'contact', 'Footer paragraph', 'textarea', 'TechCo Signature Limited is registered with the Corporate Affairs Commission under the Companies and Allied Matters Act 2020.'],

            // ─── Home — the digital agency ────────────────────────────────
            ['home.hero.eyebrow', 'home', 'hero', 'Small label', 'text', 'A digital agency in Abuja'],
            ['home.hero.line1', 'home', 'hero', 'Headline line 1', 'text', 'BRANDS'],
            ['home.hero.line2', 'home', 'hero', 'Headline line 2', 'text', 'BUILT TO BE'],
            ['home.hero.line3', 'home', 'hero', 'Headline line 3', 'text', 'BELIEVED.'],
            ['home.hero.body', 'home', 'hero', 'Paragraph', 'textarea', 'We build the websites, run the campaigns and shape the brands that make people take an organisation seriously.'],
            ['home.hero.cta_primary', 'home', 'hero', 'Main button', 'text', 'Start a project'],
            ['home.hero.cta_secondary', 'home', 'hero', 'Second button', 'text', 'See what we do'],

            ['home.trust.label', 'home', 'trust', 'Trust strip', 'text', 'We work with ministries, schools, non-profits and growing businesses across Nigeria'],

            ['home.services.eyebrow', 'home', 'services', 'Small label', 'text', 'What we do'],
            ['home.services.heading', 'home', 'services', 'Heading', 'text', 'THE WORK WE DO BEST'],
            ['home.services.body', 'home', 'services', 'Paragraph beside heading', 'textarea', 'Six services. Take one, or hand us the whole thing.'],

            ['home.approach.eyebrow', 'home', 'approach', 'Small label', 'text', 'How we work'],
            ['home.approach.heading', 'home', 'approach', 'Heading', 'text', 'NO SURPRISES. EVER.'],
            ['home.approach.body', 'home', 'approach', 'Paragraph beside heading', 'textarea', 'You know the scope, the price and the date before we start. Then we start.'],

            ['home.arms.eyebrow', 'home', 'arms', 'Small label', 'text', 'More than an agency'],
            ['home.arms.heading', 'home', 'arms', 'Heading', 'text', 'TWO MORE THINGS WE DO'],
            ['home.arms.body', 'home', 'arms', 'Paragraph', 'textarea', 'One TechCo account gives you all of it.'],

            ['home.cta.heading', 'home', 'cta', 'Heading', 'text', 'LET US TALK.'],
            ['home.cta.body', 'home', 'cta', 'Paragraph', 'textarea', 'Tell us what you are trying to build. First conversation costs nothing.'],
            ['home.cta.button', 'home', 'cta', 'Button', 'text', 'Start a project'],

            // ─── Recruitment ──────────────────────────────────────────────
            ['recruitment.hero.eyebrow', 'recruitment', 'hero', 'Small label', 'text', 'TechCo Recruitment'],
            ['recruitment.hero.line1', 'recruitment', 'hero', 'Headline line 1', 'text', 'TRAINED'],
            ['recruitment.hero.line2', 'recruitment', 'hero', 'Headline line 2', 'text', 'FIRST.'],
            ['recruitment.hero.line3', 'recruitment', 'hero', 'Headline line 3', 'text', 'THEN HIRED.'],
            ['recruitment.hero.body', 'recruitment', 'hero', 'Paragraph', 'textarea', 'Most agencies send a CV and hope. We get people ready first, then we introduce them.'],
            ['recruitment.hero.cta_primary', 'recruitment', 'hero', 'Main button', 'text', 'Choose your path'],

            ['recruitment.doors.eyebrow', 'recruitment', 'doors', 'Small label', 'text', 'Three ways in'],
            ['recruitment.doors.heading', 'recruitment', 'doors', 'Heading', 'text', 'WHICH ONE ARE YOU?'],

            ['recruitment.doors.employer_title', 'recruitment', 'doors', 'Employer — title', 'text', 'I need staff'],
            ['recruitment.doors.employer_body', 'recruitment', 'doors', 'Employer — paragraph', 'textarea', 'Tell us the role. We send you three to five people who are ready to work, not a pile of CVs.'],
            ['recruitment.doors.employer_points', 'recruitment', 'doors', 'Employer — list (one per line)', 'textarea', "Every candidate is trained and screened before you see them\nA 90-day free replacement on every hire\nYou pay nothing until someone starts work"],
            ['recruitment.doors.employer_cta', 'recruitment', 'doors', 'Employer — button', 'text', 'Hire through us'],

            ['recruitment.doors.candidate_title', 'recruitment', 'doors', 'Job seeker — title', 'text', 'I am looking for a job'],
            ['recruitment.doors.candidate_body', 'recruitment', 'doors', 'Job seeker — paragraph', 'textarea', 'Join the Job Readiness Programme. We get you ready, then we introduce you to employers who are hiring.'],
            ['recruitment.doors.candidate_points', 'recruitment', 'doors', 'Job seeker — list (one per line)', 'textarea', "Your CV rebuilt with you by a real person\nA real mock interview, with honest feedback\nA certificate that is yours to keep\nWe never promise a job. We promise you will be ready."],
            ['recruitment.doors.candidate_cta', 'recruitment', 'doors', 'Job seeker — button', 'text', 'Start my application'],

            ['recruitment.doors.agent_title', 'recruitment', 'doors', 'Agent — title', 'text', 'I want to refer people'],
            ['recruitment.doors.agent_body', 'recruitment', 'doors', 'Agent — paragraph', 'textarea', 'Bring us people who are looking for work. When we place them, you get paid.'],
            ['recruitment.doors.agent_points', 'recruitment', 'doors', 'Agent — list (one per line)', 'textarea', "Earn commission on every successful placement\nTrack every referral in your own dashboard\nPaid by bank transfer, with a statement each time\nFree to join"],
            ['recruitment.doors.agent_cta', 'recruitment', 'doors', 'Agent — button', 'text', 'Become an agent'],

            ['recruitment.steps.eyebrow', 'recruitment', 'steps', 'Small label', 'text', 'How it works'],
            ['recruitment.steps.heading', 'recruitment', 'steps', 'Heading', 'text', 'FOUR STEPS. NO GUESSWORK.'],
            ['recruitment.steps.body', 'recruitment', 'steps', 'Paragraph beside heading', 'textarea', 'You always know where you stand and what happens next.'],

            ['recruitment.fees.heading', 'recruitment', 'fees', 'Heading', 'text', 'NO HIDDEN FEES. EVER.'],
            ['recruitment.fees.body', 'recruitment', 'fees', 'Paragraph', 'textarea', 'You see every fee in writing before you pay anything. We charge for training you receive, not for a promise. We never ask a job seeker for a bank account number, a BVN or a card.'],
            ['recruitment.fees.note', 'recruitment', 'fees', 'Small print', 'text', 'Prices are shown when you choose a programme during registration.'],

            ['recruitment.cta.heading', 'recruitment', 'cta', 'Heading', 'text', 'READY WHEN YOU ARE.'],
            ['recruitment.cta.body', 'recruitment', 'cta', 'Paragraph', 'textarea', 'One conversation. No cost, and no obligation.'],
            ['recruitment.cta.button', 'recruitment', 'cta', 'Button', 'text', 'Get started'],

            // ─── Branding School ──────────────────────────────────────────
            ['school.hero.eyebrow', 'school', 'hero', 'Small label', 'text', 'TechCo Branding School'],
            ['school.hero.line1', 'school', 'hero', 'Headline line 1', 'text', 'LEARN'],
            ['school.hero.line2', 'school', 'hero', 'Headline line 2', 'text', 'THE SKILL.'],
            ['school.hero.line3', 'school', 'hero', 'Headline line 3', 'text', 'USE IT MONDAY.'],
            ['school.hero.body', 'school', 'hero', 'Paragraph', 'textarea', 'Practical digital skills taught online, month by month. Start with one subject or take several. Stop whenever you want.'],
            ['school.hero.cta_primary', 'school', 'hero', 'Main button', 'text', 'Enrol now'],
            ['school.hero.cta_secondary', 'school', 'hero', 'Second button', 'text', 'See the subjects'],

            ['school.streams.eyebrow', 'school', 'streams', 'Small label', 'text', 'What you can learn'],
            ['school.streams.heading', 'school', 'streams', 'Heading', 'text', 'PICK YOUR SUBJECT'],
            ['school.streams.body', 'school', 'streams', 'Paragraph beside heading', 'textarea', 'Every subject is taught by someone who does this work for real clients.'],

            ['school.how.eyebrow', 'school', 'how', 'Small label', 'text', 'How it works'],
            ['school.how.heading', 'school', 'how', 'Heading', 'text', 'SIMPLE AS IT SOUNDS'],
            ['school.how.body', 'school', 'how', 'Paragraph beside heading', 'textarea', 'No entrance exam. No long contract. No catch.'],

            ['school.fees.heading', 'school', 'fees', 'Heading', 'text', 'PAY BY THE MONTH.'],
            ['school.fees.body', 'school', 'fees', 'Paragraph', 'textarea', 'You pay for one month at a time and stop at the end of any month you have paid for. There is no joining fee and no long contract.'],
            ['school.fees.note', 'school', 'fees', 'Small print', 'text', 'The monthly fee is shown when you choose your subjects during registration.'],

            ['school.join.title', 'school', 'join', 'Register page — title', 'text', 'I want to learn'],
            ['school.join.body', 'school', 'join', 'Register page — paragraph', 'textarea', 'Create your TechCo account, pick your subjects, and start this month.'],
            ['school.join.points', 'school', 'join', 'Register page — list (one per line)', 'textarea', "Four subjects to choose from\nPay one month at a time\nStop at the end of any month you have paid for\nA certificate when you finish a subject"],

            ['school.cta.heading', 'school', 'cta', 'Heading', 'text', 'START THIS MONTH.'],
            ['school.cta.body', 'school', 'cta', 'Paragraph', 'textarea', 'Register, pick your subjects, and begin.'],
            ['school.cta.button', 'school', 'cta', 'Button', 'text', 'Enrol now'],
        ];

        foreach ($fields as $position => [$key, $page, $section, $label, $type, $value]) {
            SiteContent::updateOrCreate(
                ['key' => $key],
                compact('page', 'section', 'label', 'type', 'value') + ['position' => $position],
            );
        }
    }

    /**
     * Repeatable blocks. Collection names are prefixed with their page.
     */
    private function items(): void
    {
        $collections = [
            // ─── Home ─────────────────────────────────────────────────────
            'home.stats' => ['home', [
                ['value' => 'Six', 'label' => 'Services under one roof'],
                ['value' => 'Fixed', 'label' => 'Scope and price agreed before we start'],
                ['value' => 'Abuja', 'label' => 'Working with clients across Nigeria'],
            ]],

            'home.services' => ['home', [
                ['title' => 'Web development', 'body' => 'Websites and web applications that load fast, work properly and are easy for your own team to run.'],
                ['title' => 'Social media management', 'body' => 'We plan it, write it, design it and post it. Every month, on schedule, without chasing.'],
                ['title' => 'Brand visibility', 'body' => 'Getting the right people to notice you, and to remember you the next time they need what you do.'],
                ['title' => 'Brand strategy and identity', 'body' => 'We work out what you stand for and say it clearly. Research first. Design second.'],
                ['title' => 'Digital consultancy', 'body' => 'Straight advice on what to build, what to drop, and what it should honestly cost.'],
                ['title' => 'Bespoke projects', 'body' => 'Work that does not fit a template. We scope it, price it, and build it properly.'],
            ]],

            'home.approach' => ['home', [
                ['number' => '01', 'title' => 'We listen', 'body' => 'You tell us the problem. We ask hard questions before we quote anything.'],
                ['number' => '02', 'title' => 'We agree it in writing', 'body' => 'Scope, price and dates, on one page, signed by both of us.'],
                ['number' => '03', 'title' => 'We build', 'body' => 'You see progress as it happens. No disappearing for three weeks.'],
                ['number' => '04', 'title' => 'We hand over', 'body' => 'You own everything. We show your team how to run it themselves.'],
            ]],

            'home.arms' => ['home', [
                ['title' => 'TechCo Recruitment', 'body' => 'We find organisations the staff they need, and we get job seekers ready before anyone interviews them.', 'link' => 'recruitment', 'label' => 'See recruitment'],
                ['title' => 'TechCo Branding School', 'body' => 'Practical digital skills taught online, month by month. Open to anyone with a TechCo account.', 'link' => 'school', 'label' => 'See the school'],
            ]],

            'home.testimonials' => ['home', []],

            // ─── Recruitment ──────────────────────────────────────────────
            'recruitment.steps' => ['recruitment', [
                ['number' => '01', 'title' => 'Register', 'body' => 'Tell us who you are. Confirm your email with the code we send you. It takes two minutes.'],
                ['number' => '02', 'title' => 'Get ready', 'body' => 'We rebuild your CV with you. We run a real mock interview. We show you how to present yourself.'],
                ['number' => '03', 'title' => 'Meet the employer', 'body' => 'When a job suits you, we introduce you in writing. You arrive prepared, screened and briefed.'],
                ['number' => '04', 'title' => 'Start work', 'body' => 'You take the job. We check in after 30, 60 and 90 days to make sure it is going well.'],
            ]],

            'recruitment.stats' => ['recruitment', [
                ['value' => 'One to one', 'label' => 'Every candidate is trained by a real person'],
                ['value' => '90 days', 'label' => 'Free replacement guarantee for employers'],
                ['value' => 'In writing', 'label' => 'Every fee shown before you pay'],
            ]],

            // ─── Branding School ──────────────────────────────────────────
            'school.streams' => ['school', [
                ['title' => 'Digital marketing', 'body' => 'Social media, content planning, paid adverts and reading the numbers. The skills most small businesses are paying for right now.'],
                ['title' => 'Technology skills', 'body' => 'The practical digital tools every modern workplace expects you to already know.'],
                ['title' => 'Branding and brand strategy', 'body' => 'What a brand really is, how to position one, and how to say what it stands for.'],
                ['title' => 'English and presentation', 'body' => 'Speaking, writing and presenting yourself well. The reason most good candidates lose good interviews.'],
            ]],

            'school.how' => ['school', [
                ['number' => '01', 'title' => 'Register', 'body' => 'Create your TechCo account and confirm your email. Two minutes.'],
                ['number' => '02', 'title' => 'Pick your subjects', 'body' => 'Take one or take several. You see the monthly fee before you pay.'],
                ['number' => '03', 'title' => 'Learn online', 'body' => 'Lessons, assignments and real feedback on your work.'],
                ['number' => '04', 'title' => 'Get certified', 'body' => 'Finish a subject and your certificate is issued.'],
            ]],

            'school.stats' => ['school', [
                ['value' => 'Four', 'label' => 'Subjects to choose from'],
                ['value' => 'Monthly', 'label' => 'Pay as you go, stop any time'],
                ['value' => 'Online', 'label' => 'Learn from anywhere in Nigeria'],
            ]],
        ];

        foreach ($collections as $collection => [$page, $rows]) {
            SiteItem::query()->where('collection', $collection)->delete();

            foreach ($rows as $position => $data) {
                SiteItem::create(compact('collection', 'page', 'data', 'position'));
            }
        }
    }
}
