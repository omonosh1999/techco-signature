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
     * Single editable strings, grouped by the section of the page they appear in.
     */
    private function content(): void
    {
        $fields = [
            // -- Brand / global ------------------------------------------------
            ['brand.name', 'brand', 'Company name', 'text', 'TechCo Signature'],
            ['brand.tagline', 'brand', 'Tagline', 'text', 'Brands built to be believed.'],

            // -- Hero ----------------------------------------------------------
            ['hero.eyebrow', 'hero', 'Eyebrow line', 'text', 'Branding · Digital Media · Recruitment · Training'],
            ['hero.line1', 'hero', 'Headline line 1', 'text', 'TRAINED'],
            ['hero.line2', 'hero', 'Headline line 2', 'text', 'FIRST.'],
            ['hero.line3', 'hero', 'Headline line 3', 'text', 'THEN HIRED.'],
            ['hero.body', 'hero', 'Intro paragraph', 'textarea', 'We do not forward CVs and hope. We rebuild them, sit you through a real mock interview, and only then put you in front of an employer.'],
            ['hero.cta_primary', 'hero', 'Primary button', 'text', 'I am looking for a job'],
            ['hero.cta_secondary', 'hero', 'Secondary button', 'text', 'I want to refer people'],

            // -- Trust strip ---------------------------------------------------
            ['trust.label', 'trust', 'Strip label', 'text', 'Working with ministries, schools, non-profits and growing businesses'],

            // -- Process -------------------------------------------------------
            ['process.eyebrow', 'process', 'Eyebrow', 'text', 'Here is how it works'],
            ['process.heading', 'process', 'Heading', 'text', 'FROM APPLICANT TO APPOINTED'],
            ['process.body', 'process', 'Side paragraph', 'textarea', 'Four steps. No guesswork, no waiting in the dark, and you always know what happens next.'],

            // -- Services ------------------------------------------------------
            ['services.eyebrow', 'services', 'Eyebrow', 'text', 'What we do'],
            ['services.heading', 'services', 'Heading', 'text', 'FOUR THINGS, ONE ROOF'],
            ['services.body', 'services', 'Side paragraph', 'textarea', 'Most clients arrive needing one of these. Many stay for three.'],

            // -- Programmes ----------------------------------------------------
            ['programmes.eyebrow', 'programmes', 'Eyebrow', 'text', 'Where to start'],
            ['programmes.heading', 'programmes', 'Heading', 'text', 'OUR TWO PROGRAMMES'],

            // -- Mid band ------------------------------------------------------
            ['band.line1', 'band', 'Band line 1', 'text', 'BE READY.'],
            ['band.line2', 'band', 'Band line 2', 'text', 'BE CHOSEN.'],
            ['band.cta', 'band', 'Band button', 'text', 'Start now'],

            // -- Sign-up paths -------------------------------------------------
            ['paths.eyebrow', 'paths', 'Eyebrow', 'text', 'Pick your door'],
            ['paths.heading', 'paths', 'Heading', 'text', 'WHICH ONE ARE YOU?'],

            ['paths.candidate_title', 'paths', 'Candidate card title', 'text', 'I am looking for a job'],
            ['paths.candidate_body', 'paths', 'Candidate card text', 'textarea', 'Join the Job Readiness Programme. We rebuild your CV with you, run a real mock interview, coach your presentation, and then introduce you to employers who are hiring.'],
            ['paths.candidate_points', 'paths', 'Candidate bullet points (one per line)', 'textarea', "Your CV rebuilt by a real person\nA guided mock interview with honest feedback\nA certificate you keep\nWe never promise a job — we promise you will be ready"],
            ['paths.candidate_cta', 'paths', 'Candidate button', 'text', 'Register as a job seeker'],

            ['paths.agent_title', 'paths', 'Agent card title', 'text', 'I want to refer people'],
            ['paths.agent_body', 'paths', 'Agent card text', 'textarea', 'Become a TechCo Recruitment Agent. Introduce people who are genuinely looking for work, and earn a commission on every one we successfully place.'],
            ['paths.agent_points', 'paths', 'Agent bullet points (one per line)', 'textarea', "Earn commission on every successful placement\nTrack your referrals in your own dashboard\nPaid by transfer, with a statement every time\nNo cost to join"],
            ['paths.agent_cta', 'paths', 'Agent button', 'text', 'Register as an agent'],

            // -- Team ----------------------------------------------------------
            ['team.eyebrow', 'team', 'Eyebrow', 'text', 'The people behind it'],
            ['team.heading', 'team', 'Heading', 'text', 'WHO YOU WILL BE WORKING WITH'],

            // -- Testimonials --------------------------------------------------
            ['testimonials.eyebrow', 'testimonials', 'Eyebrow', 'text', 'In their words'],
            ['testimonials.heading', 'testimonials', 'Heading', 'text', 'WHAT PEOPLE SAY'],

            // -- Closing CTA ---------------------------------------------------
            ['cta.heading', 'cta', 'Closing heading', 'text', 'READY WHEN YOU ARE.'],
            ['cta.body', 'cta', 'Closing paragraph', 'textarea', 'The first conversation is free and there is no obligation.'],
            ['cta.button', 'cta', 'Closing button', 'text', 'Get started'],

            // -- Footer / contact ----------------------------------------------
            ['contact.email', 'contact', 'Email address', 'text', 'techco979@gmail.com'],
            ['contact.phone', 'contact', 'Phone / WhatsApp', 'text', '+234 704 484 0134'],
            ['contact.address', 'contact', 'Address', 'text', 'Abuja, Federal Capital Territory, Nigeria'],
            ['contact.hours', 'contact', 'Office hours', 'text', 'Monday to Friday, 9:00am – 5:00pm WAT'],
            ['contact.rc', 'contact', 'RC number', 'text', 'RC 9592495'],
            ['contact.tin', 'contact', 'Tax Identification Number', 'text', 'TIN 2623700950121'],
            ['footer.note', 'contact', 'Footer note', 'textarea', 'TechCo Signature Limited is registered with the Corporate Affairs Commission under the Companies and Allied Matters Act 2020.'],
        ];

        foreach ($fields as $position => [$key, $section, $label, $type, $value]) {
            SiteContent::updateOrCreate(
                ['key' => $key],
                compact('section', 'label', 'type', 'value') + ['position' => $position],
            );
        }
    }

    /**
     * Repeatable blocks — the admin can add, reorder, hide or delete these.
     */
    private function items(): void
    {
        $collections = [
            'stats' => [
                ['value' => '₦5,000', 'label' => 'Job Readiness Programme'],
                ['value' => '90 days', 'label' => 'Free replacement guarantee'],
                ['value' => '4', 'label' => 'Branding School streams'],
            ],

            'process' => [
                ['number' => '01', 'title' => 'Register and verify', 'body' => 'Tell us who you are and confirm your email with a code. It takes two minutes.'],
                ['number' => '02', 'title' => 'Join the programme', 'body' => 'Pay the Job Readiness fee and we begin. Your CV is rebuilt, your interview technique is coached, and you get your materials.'],
                ['number' => '03', 'title' => 'Get introduced', 'body' => 'When a role fits you, we introduce you to the employer in writing — prepared, screened and briefed.'],
                ['number' => '04', 'title' => 'Start work', 'body' => 'You take the job. We check in at 30, 60 and 90 days to make sure it is going well.'],
            ],

            'services' => [
                ['title' => 'Recruitment & Talent', 'body' => 'Staff who are trained before they are placed, with a three-month free replacement guarantee on every hire.'],
                ['title' => 'Branding Strategy', 'body' => 'Brand audits, positioning, messaging and identity direction. Research first — we do not design before we know what it means.'],
                ['title' => 'Digital Marketing', 'body' => 'Social media, content, paid advertising and reporting — built around a number you actually care about.'],
                ['title' => 'TechCo Branding School', 'body' => 'An online school in branding, digital marketing, technology skills, and English and presentation.'],
            ],

            'programmes' => [
                ['title' => 'Job Readiness Programme', 'price' => '₦5,000', 'body' => 'CV rebuilt with a real person, a guided mock interview, presentation coaching, and a certificate. Delivered whether or not a job comes.'],
                ['title' => 'TechCo Branding School', 'price' => '₦25,000 / month', 'body' => 'Four streams, online, open to anyone. Study one or several, stop at the end of any month you have paid for.'],
            ],

            'team' => [
                ['name' => 'Abel Joy Chidinma', 'role' => 'Founder & Chief Executive Officer', 'bio' => 'Brand strategist and TRCN-registered teacher. Leads the branding, media, recruitment and training divisions.'],
            ],

            'testimonials' => [],

            'trust' => [],
        ];

        foreach ($collections as $collection => $rows) {
            SiteItem::query()->where('collection', $collection)->delete();

            foreach ($rows as $position => $data) {
                SiteItem::create(compact('collection', 'data', 'position'));
            }
        }
    }
}
