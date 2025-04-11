import unittest
from src.qrcode_gen import gen_code

class TestGenerateRandomCode(unittest.TestCase):

    def setUp(self):
        gen_code.random.seed(42)

    def test_code_length(self):
        code = gen_code.generateRandomCode()
        self.assertEqual(len(str(code)), gen_code.QR_CODE_SIZE)

    def test_first_digit(self):
        for _ in range(100):  # Run multiple times to check probability
            code = gen_code.generateRandomCode()
            first_digit = int(str(code)[0])
            self.assertNotEqual(first_digit, 0)
            self.assertGreaterEqual(first_digit, 1)
            self.assertLessEqual(first_digit, 9)

    def test_code_range(self):
        min_expected = 10 ** (gen_code.QR_CODE_SIZE - 1)  # Smallest possible (1 followed by zeros)
        max_expected = (10 ** gen_code.QR_CODE_SIZE) - 1  # Largest possible (all 9s)
        
        for _ in range(10):  # Test multiple times
            code = gen_code.generateRandomCode()
            self.assertGreaterEqual(code, min_expected)
            self.assertLessEqual(code, max_expected)

    def test_randomness(self):
        codes = { gen_code.generateRandomCode() for _ in range(10) }
        self.assertTrue(len(codes) == 10)

        
if __name__ == "__main__":
    unittest.main()