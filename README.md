# 🛒 Shopping List Manager (PHP)

A PHP class to manage grocery lists through text commands, implemented with TDD.

## 📋 Features

- **Simple interface**: Single public `process()` method
- **Case-insensitive**: "Bread" = "bread" = "BREAD"
- **Quantity management**: Auto-sums quantities for existing products
- **Alphabetical sorting**: Case-insensitive ordering
- **Clear error messages**

## 🎯 Supported Commands

| Command | Format | Example |
|---------|--------|---------|
| Add | `add <product> [quantity]` | `add bread 3` |
| Remove | `remove <product>` | `remove milk` |
| Clear | `clear` | `clear` |

## 📌 Output Format

```php
"product xquantity"  // Example: "milk x2, bread x1"
""                  // When list is empty
"Selected product does not exist" // Error