<?php

declare(strict_types=1);
include_once __DIR__ . '/stubs/Validator.php';
class TelefonansageValidationTest extends TestCaseSymconValidation
{
    public function testValidateTelefonansage(): void
    {
        $this->validateLibrary(__DIR__ . '/..');
    }
    public function testValidatePhoneAnnouncementModule(): void
    {
        $this->validateModule(__DIR__ . '/../PhoneAnnouncement');
    }
}