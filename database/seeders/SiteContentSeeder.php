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
            ['global.footer.note', 'global', 'contact', 'Footer paragraph', 'textarea', 'TechCo Signature Limited is incorporated in Nigeria under the Companies and Allied Matters Act 2020 and registered with the Corporate Affairs Commission.'],

            // ─── Home — the digital agency ────────────────────────────────
            ['home.hero.eyebrow', 'home', 'hero', 'Small label', 'text', 'A digital agency in Abuja'],
            ['home.hero.line1', 'home', 'hero', 'Headline line 1', 'text', 'BRANDS'],
            ['home.hero.line2', 'home', 'hero', 'Headline line 2', 'text', 'BUILT TO BE'],
            ['home.hero.line3', 'home', 'hero', 'Headline line 3', 'text', 'BELIEVED.'],
            ['home.hero.body', 'home', 'hero', 'Paragraph', 'textarea', 'We design the identities, build the platforms and run the campaigns that establish an organisation as the authority in its field.'],
            ['home.hero.cta_primary', 'home', 'hero', 'Main button', 'text', 'Start a project'],
            ['home.hero.cta_secondary', 'home', 'hero', 'Second button', 'text', 'View our services'],

            ['home.trust.label', 'home', 'trust', 'Trust strip', 'text', 'Trusted by ministries, schools, non-profit organisations and growing businesses across Nigeria'],

            ['home.services.eyebrow', 'home', 'services', 'Small label', 'text', 'Our services'],
            ['home.services.heading', 'home', 'services', 'Heading', 'text', 'THE WORK WE DO BEST'],
            ['home.services.body', 'home', 'services', 'Paragraph beside heading', 'textarea', 'Six disciplines, delivered to the same standard. Engage us for one, or entrust us with the whole brief.'],

            ['home.approach.eyebrow', 'home', 'approach', 'Small label', 'text', 'How we work'],
            ['home.approach.heading', 'home', 'approach', 'Heading', 'text', 'NO SURPRISES. EVER.'],
            ['home.approach.body', 'home', 'approach', 'Paragraph beside heading', 'textarea', 'Scope, cost and delivery dates are agreed and documented before a single hour is billed.'],

            ['home.arms.eyebrow', 'home', 'arms', 'Small label', 'text', 'Beyond the agency'],
            ['home.arms.heading', 'home', 'arms', 'Heading', 'text', 'TWO FURTHER DIVISIONS'],
            ['home.arms.body', 'home', 'arms', 'Paragraph', 'textarea', 'A single TechCo account gives you access to every division we operate.'],

            ['home.cta.heading', 'home', 'cta', 'Heading', 'text', 'LET US TALK.'],
            ['home.cta.body', 'home', 'cta', 'Paragraph', 'textarea', 'Tell us what you are building. The first consultation is free and carries no obligation.'],
            ['home.cta.button', 'home', 'cta', 'Button', 'text', 'Start a project'],

            // ─── Recruitment ──────────────────────────────────────────────
            ['recruitment.hero.eyebrow', 'recruitment', 'hero', 'Small label', 'text', 'TechCo Recruitment'],
            ['recruitment.hero.line1', 'recruitment', 'hero', 'Headline line 1', 'text', 'THE ROLES'],
            ['recruitment.hero.line2', 'recruitment', 'hero', 'Headline line 2', 'text', 'ARE THERE.'],
            ['recruitment.hero.line3', 'recruitment', 'hero', 'Headline line 3', 'text', 'BE THE CHOICE.'],
            ['recruitment.hero.body', 'recruitment', 'hero', 'Paragraph', 'textarea', 'We hold live roles with employers across Nigeria. What separates the candidates who are appointed from those who are not is preparation — and that is precisely what we provide.'],
            ['recruitment.hero.cta_primary', 'recruitment', 'hero', 'Main button', 'text', 'Choose your path'],

            ['recruitment.doors.eyebrow', 'recruitment', 'doors', 'Small label', 'text', 'Three ways to work with us'],
            ['recruitment.doors.heading', 'recruitment', 'doors', 'Heading', 'text', 'WHICH ONE ARE YOU?'],

            ['recruitment.doors.employer_title', 'recruitment', 'doors', 'Employer — title', 'text', 'I need staff'],
            ['recruitment.doors.employer_body', 'recruitment', 'doors', 'Employer — paragraph', 'textarea', 'Brief us on the role. You receive a shortlist of three to five prepared candidates — not an inbox of unread applications.'],
            ['recruitment.doors.employer_points', 'recruitment', 'doors', 'Employer — list (one per line)', 'textarea', "Every candidate is trained, screened and referenced before they reach you\nA 90-day replacement guarantee on every placement, at no additional cost\nNo fee is payable until your new hire has started work"],
            ['recruitment.doors.employer_cta', 'recruitment', 'doors', 'Employer — button', 'text', 'Hire through us'],

            ['recruitment.doors.candidate_title', 'recruitment', 'doors', 'Job seeker — title', 'text', 'I am looking for a job'],
            ['recruitment.doors.candidate_body', 'recruitment', 'doors', 'Job seeker — paragraph', 'textarea', 'Enrol in the Job Readiness Programme. We prepare you to a professional standard, then introduce you to employers who are actively recruiting.'],
            ['recruitment.doors.candidate_points', 'recruitment', 'doors', 'Job seeker — list (one per line)', 'textarea', "Your CV rewritten with you by a seasoned professional\nA full mock interview, with candid and practical feedback\nCoaching on presentation, communication and professional conduct\nA certificate of completion that stays on your record"],
            ['recruitment.doors.candidate_cta', 'recruitment', 'doors', 'Job seeker — button', 'text', 'Start my application'],

            ['recruitment.doors.agent_title', 'recruitment', 'doors', 'Agent — title', 'text', 'I want to refer candidates'],
            ['recruitment.doors.agent_body', 'recruitment', 'doors', 'Agent — paragraph', 'textarea', 'Introduce candidates who are genuinely seeking work. When we place them successfully, you earn a commission.'],
            ['recruitment.doors.agent_points', 'recruitment', 'doors', 'Agent — list (one per line)', 'textarea', "Commission on every successful placement\nEvery referral tracked in your own dashboard\nPaid by bank transfer, with a full statement each time\nNo cost to join"],
            ['recruitment.doors.agent_cta', 'recruitment', 'doors', 'Agent — button', 'text', 'Become an agent'],

            ['recruitment.steps.eyebrow', 'recruitment', 'steps', 'Small label', 'text', 'Our process'],
            ['recruitment.steps.heading', 'recruitment', 'steps', 'Heading', 'text', 'FOUR STAGES. NO GUESSWORK.'],
            ['recruitment.steps.body', 'recruitment', 'steps', 'Paragraph beside heading', 'textarea', 'You know exactly where your application stands and what follows at every stage.'],

            ['recruitment.fees.heading', 'recruitment', 'fees', 'Heading', 'text', 'NO HIDDEN FEES. EVER.'],
            ['recruitment.fees.body', 'recruitment', 'fees', 'Paragraph', 'textarea', 'Every fee is set out in writing before any payment is made. We charge for training that is delivered, and we do not request bank account numbers, BVNs or card details from candidates at any point.'],
            ['recruitment.fees.note', 'recruitment', 'fees', 'Small print', 'text', 'Programme fees are presented in full when you make your selection during registration.'],

            ['recruitment.cta.heading', 'recruitment', 'cta', 'Heading', 'text', 'READY WHEN YOU ARE.'],
            ['recruitment.cta.body', 'recruitment', 'cta', 'Paragraph', 'textarea', 'One conversation, at no cost and with no obligation.'],
            ['recruitment.cta.button', 'recruitment', 'cta', 'Button', 'text', 'Get started'],

            // ─── Branding School ──────────────────────────────────────────
            ['school.hero.eyebrow', 'school', 'hero', 'Small label', 'text', 'TechCo Branding School'],
            ['school.hero.line1', 'school', 'hero', 'Headline line 1', 'text', 'LEARN'],
            ['school.hero.line2', 'school', 'hero', 'Headline line 2', 'text', 'THE SKILL.'],
            ['school.hero.line3', 'school', 'hero', 'Headline line 3', 'text', 'USE IT MONDAY.'],
            ['school.hero.body', 'school', 'hero', 'Paragraph', 'textarea', 'Current, practical digital skills taught online by practitioners. Enrol in a single subject or several, pay month by month, and continue for as long as it serves you.'],
            ['school.hero.cta_primary', 'school', 'hero', 'Main button', 'text', 'Enrol now'],
            ['school.hero.cta_secondary', 'school', 'hero', 'Second button', 'text', 'View the subjects'],

            ['school.streams.eyebrow', 'school', 'streams', 'Small label', 'text', 'What you can study'],
            ['school.streams.heading', 'school', 'streams', 'Heading', 'text', 'CHOOSE YOUR SUBJECT'],
            ['school.streams.body', 'school', 'streams', 'Paragraph beside heading', 'textarea', 'Every subject is taught by someone who does this work for paying clients, not from a textbook.'],

            ['school.how.eyebrow', 'school', 'how', 'Small label', 'text', 'How enrolment works'],
            ['school.how.heading', 'school', 'how', 'Heading', 'text', 'STRAIGHTFORWARD THROUGHOUT'],
            ['school.how.body', 'school', 'how', 'Paragraph beside heading', 'textarea', 'No entrance examination, no minimum term, and no conditions buried in the small print.'],

            ['school.fees.heading', 'school', 'fees', 'Heading', 'text', 'PAY BY THE MONTH.'],
            ['school.fees.body', 'school', 'fees', 'Paragraph', 'textarea', 'You pay for one month at a time and may conclude your studies at the end of any month you have paid for. There is no registration fee and no minimum term.'],
            ['school.fees.note', 'school', 'fees', 'Small print', 'text', 'The monthly fee is presented in full when you select your subjects during registration.'],

            ['school.join.title', 'school', 'join', 'Register page — title', 'text', 'I want to study with TechCo'],
            ['school.join.body', 'school', 'join', 'Register page — paragraph', 'textarea', 'Create your TechCo account, select your subjects, and begin this month.'],
            ['school.join.points', 'school', 'join', 'Register page — list (one per line)', 'textarea', "Four subjects to choose from\nFees paid one month at a time\nConclude at the end of any month you have paid for\nA certificate on completion of each subject"],

            ['school.cta.heading', 'school', 'cta', 'Heading', 'text', 'BEGIN THIS MONTH.'],
            ['school.cta.body', 'school', 'cta', 'Paragraph', 'textarea', 'Register, select your subjects, and start straight away.'],
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
                ['value' => 'Six', 'label' => 'Disciplines under one roof'],
                ['value' => 'Fixed', 'label' => 'Scope and cost agreed before work begins'],
                ['value' => 'Abuja', 'label' => 'Serving clients across Nigeria'],
            ]],

            'home.services' => ['home', [
                ['title' => 'Web development', 'body' => 'Websites and web applications engineered for speed, reliability and straightforward day-to-day management by your own team.'],
                ['title' => 'Social media management', 'body' => 'Strategy, copy, design and scheduling delivered on a consistent monthly calendar. You will never have to chase us for a post.'],
                ['title' => 'Brand visibility', 'body' => 'Deliberate positioning that places you in front of the right audience, and keeps you there until the moment they are ready to act.'],
                ['title' => 'Brand strategy and identity', 'body' => 'We establish what your organisation stands for, then express it with precision. Research informs every design decision we make.'],
                ['title' => 'Digital consultancy', 'body' => 'Independent counsel on what to build, what to retire, and what the work should genuinely cost.'],
                ['title' => 'Bespoke projects', 'body' => 'Requirements no template accommodates. We scope them thoroughly, price them transparently, and build them to last.'],
            ]],

            'home.approach' => ['home', [
                ['number' => '01', 'title' => 'Discovery', 'body' => 'We interrogate the brief before we quote. The right questions asked early prevent expensive corrections later.'],
                ['number' => '02', 'title' => 'Scope and terms', 'body' => 'Deliverables, pricing and timelines documented on a single page and signed by both parties.'],
                ['number' => '03', 'title' => 'Delivery', 'body' => 'Work progresses in the open. You review as we build, never for the first time at the end.'],
                ['number' => '04', 'title' => 'Handover', 'body' => 'You own every asset outright. We train your team to operate it without us.'],
            ]],

            'home.arms' => ['home', [
                ['title' => 'TechCo Recruitment', 'body' => 'We place prepared candidates with employers across Nigeria, and we make certain those candidates are ready before any introduction is made.', 'link' => 'recruitment', 'label' => 'View recruitment'],
                ['title' => 'TechCo Branding School', 'body' => 'Practical digital skills taught online by working practitioners. Open to anyone holding a TechCo account.', 'link' => 'school', 'label' => 'View the school'],
            ]],

            'home.testimonials' => ['home', []],

            // ─── Recruitment ──────────────────────────────────────────────
            'recruitment.steps' => ['recruitment', [
                ['number' => '01', 'title' => 'Registration', 'body' => 'Provide your details and verify your email with the code we send you. It takes two minutes.'],
                ['number' => '02', 'title' => 'Preparation', 'body' => 'We rewrite your CV with you, conduct a full mock interview, and coach your presentation and professional conduct.'],
                ['number' => '03', 'title' => 'Introduction', 'body' => 'When a role suits your profile, we introduce you formally in writing. You arrive prepared, screened and properly briefed.'],
                ['number' => '04', 'title' => 'Placement', 'body' => 'You take up the appointment. We review how it is going at 30, 60 and 90 days.'],
            ]],

            'recruitment.stats' => ['recruitment', [
                ['value' => 'Individual', 'label' => 'Every candidate prepared one-to-one by a senior professional'],
                ['value' => '90 days', 'label' => 'Replacement guarantee on every placement, at no cost'],
                ['value' => 'Transparent', 'label' => 'Every fee disclosed in writing before payment'],
            ]],

            // ─── Branding School ──────────────────────────────────────────
            'school.streams' => ['school', [
                ['title' => 'Digital marketing', 'body' => 'Social media, content planning, paid advertising and campaign measurement — the capabilities businesses are actively recruiting for today.'],
                ['title' => 'Technology skills', 'body' => 'The practical digital tools every modern workplace now assumes you already command.'],
                ['title' => 'Branding and brand strategy', 'body' => 'What a brand genuinely is, how to position one credibly, and how to articulate what it stands for.'],
                ['title' => 'English and presentation', 'body' => 'Speaking, writing and presenting with authority — the single most common reason capable candidates lose interviews they should win.'],
            ]],

            'school.how' => ['school', [
                ['number' => '01', 'title' => 'Registration', 'body' => 'Create your TechCo account and verify your email address. Two minutes.'],
                ['number' => '02', 'title' => 'Selection', 'body' => 'Choose a single subject or several. Fees are presented in full before you commit to anything.'],
                ['number' => '03', 'title' => 'Instruction', 'body' => 'Structured lessons, set assignments, and considered feedback on the work you submit.'],
                ['number' => '04', 'title' => 'Certification', 'body' => 'Complete a subject and your certificate is issued.'],
            ]],

            'school.stats' => ['school', [
                ['value' => 'Four', 'label' => 'Subjects available to study'],
                ['value' => 'Monthly', 'label' => 'Paid as you go, concluded whenever you choose'],
                ['value' => 'Online', 'label' => 'Study from anywhere in Nigeria'],
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
