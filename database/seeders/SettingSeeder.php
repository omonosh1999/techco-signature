<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // group, key, label, type, value, help, secret
            ['payments', 'paystack.mode', 'Mode', 'select:test,live', 'test', 'Use test mode until you are ready to take real money.', false],
            ['payments', 'paystack.test_public_key', 'Paystack test public key', 'text', null, 'Starts with pk_test_', false],
            ['payments', 'paystack.test_secret_key', 'Paystack test secret key', 'password', null, 'Starts with sk_test_. Stored encrypted.', true],
            ['payments', 'paystack.live_public_key', 'Paystack live public key', 'text', null, 'Starts with pk_live_', false],
            ['payments', 'paystack.live_secret_key', 'Paystack live secret key', 'password', null, 'Starts with sk_live_. Stored encrypted.', true],

            ['prices', 'price.job_readiness', 'Job Readiness Programme', 'money', '5000', 'One-off fee paid by a job seeker.', false],
            ['prices', 'price.branding_school', 'Branding School (per month)', 'money', '25000', 'Charged monthly per student.', false],

            ['commissions', 'commission.agent_percent', 'Agent commission', 'percent', '5', 'Percentage of what TechCo actually collects from a successful applicant the agent referred.', false],
            ['commissions', 'commission.minimum_payout', 'Minimum payout', 'money', '5000', 'An agent must reach this balance before a payout is released.', false],

            ['company', 'company.name', 'Registered name', 'text', 'TechCo Signature Limited', null, false],
            ['company', 'company.rc', 'RC number', 'text', '9592495', null, false],
            ['company', 'company.tin', 'Tax Identification Number', 'text', '2623700950121', null, false],
            ['company', 'company.bank_name', 'Bank name', 'text', 'Zenith Bank', null, false],
            ['company', 'company.account_name', 'Account name', 'text', 'MOA EXCEL INTERNATIONAL', null, false],
            ['company', 'company.account_number', 'Account number', 'text', '1214299808', null, false],

            // Look and feel of the public site. Everything here is a CSS
            // variable, so changing a value restyles the page with no deploy.
            ['theme', 'theme.bg', 'Page background', 'color', '#ffffff', null, false],
            ['theme', 'theme.fg', 'Page text', 'color', '#000000', null, false],
            ['theme', 'theme.inverse_bg', 'Dark section background', 'color', '#000000', null, false],
            ['theme', 'theme.inverse_fg', 'Dark section text', 'color', '#ffffff', null, false],
            ['theme', 'theme.muted_bg', 'Soft section background', 'color', '#f4f4f2', null, false],
            ['theme', 'theme.border', 'Border colour', 'color', '#e3e3e0', null, false],
            ['theme', 'theme.accent', 'Accent colour', 'color', '#000000', 'Used for buttons and highlights.', false],

            ['theme', 'theme.display_min', 'Headline size — small screens', 'text', '2.75rem', 'Smallest size a big headline shrinks to.', false],
            ['theme', 'theme.display_max', 'Headline size — large screens', 'text', '10rem', 'Largest size a big headline grows to.', false],
            ['theme', 'theme.section_heading_max', 'Section heading size', 'text', '4.5rem', null, false],
            ['theme', 'theme.body_size', 'Body text size', 'text', '1.0625rem', null, false],
            ['theme', 'theme.bullet_size', 'Bullet point size', 'text', '1.125rem', 'Size of the ticked lists in the sign-up cards.', false],
            ['theme', 'theme.eyebrow_size', 'Small label size', 'text', '0.8125rem', null, false],
            ['theme', 'theme.radius', 'Corner roundness', 'text', '1.5rem', null, false],
            ['theme', 'theme.max_width', 'Content width', 'text', '80rem', null, false],

            ['email', 'mail.from_name', 'Sender name', 'text', 'TechCo Signature', 'The name people see when an email arrives.', false],
            ['email', 'mail.from_address', 'Sender address', 'text', 'techco979@gmail.com', null, false],
            ['email', 'mail.reply_to', 'Reply-to address', 'text', 'techco979@gmail.com', null, false],
        ];

        foreach ($settings as $position => [$group, $key, $label, $type, $value, $help, $isSecret]) {
            $setting = Setting::firstOrNew(['key' => $key]);

            // Never overwrite a key an admin has already entered.
            if ($setting->exists) {
                continue;
            }

            $setting->fill([
                'group' => $group,
                'label' => $label,
                'type' => $type,
                'help' => $help,
                'is_secret' => $isSecret,
                'position' => $position,
            ]);

            $setting->value = $value;
            $setting->save();
        }
    }
}
