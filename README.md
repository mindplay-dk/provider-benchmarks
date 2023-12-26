Service Provider Benchmarks
===========================

What's in the folders?

- `src/use_case` contains a set of use-case stubs to demonstrates dependency injection.
- `src/minimal_type_safety` implements a simple DI container and sample providers with minimal type-safety.
- `src/optional_callable_types` implements a simple DI container and sample providers with optional callable interface types.
- `src/required_types` implements a simple DI container and sample providers with stricter, required interface types.

`test/test.php` contains basic tests to assert that each implementation is doing the same thing.

`bench/bench.php` runs a basic benchmark of each of the container/provider implementations.
