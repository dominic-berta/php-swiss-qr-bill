<?php declare(strict_types=1);

namespace Sprain\Tests\SwissQrBill\PaymentPart;

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use PHPUnit\Framework\TestCase;
use Sprain\SwissQrBill\PaymentPart\Translation\Translation;

class TranslationTest extends TestCase
{
    use ArraySubsetAsserts;

    /**
     * @dataProvider allTranslationsProvider
     */
    public function testAllByLanguage(string $locale, array $subset): void
    {
        $this->assertArraySubset($subset, Translation::getAllByLanguage($locale));
    }

    public function allTranslationsProvider(): array
    {
        return [
            ['de', ['paymentPart' => 'Zahlteil']],
            ['fr', ['paymentPart' => 'Section de paiement']],
            ['it', ['paymentPart' => 'Sezione di pagamento']],
            ['en', ['paymentPart' => 'Payment part']]
        ];
    }

    /**
     * @dataProvider singleTranslationProvider
     */
    public function testGet(string $locale, string $key, string $translation)
    {
        $this->assertSame($translation, Translation::get($key, $locale));
    }

    public function singleTranslationProvider(): array
    {
        return [
            ['de', 'paymentPart', 'Zahlteil'],
            ['fr', 'paymentPart', 'Section de paiement'],
            ['it', 'paymentPart', 'Sezione di pagamento'],
            ['en', 'paymentPart', 'Payment part']
        ];
    }
}
