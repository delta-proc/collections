# Collections
Collections implementation with generators. This thing is just for practice

## How to use
Read the tests


### Rust bindings.

To use the rust-bindings you will need to install rust.

Go to https://rustup.rs to install cargo and the rustlang toolchain.

If you are going to use the rust binding you wil need a php version >= 8.0

To compile the php extention run:
```
cargo build --release
```

This creates a libcollections.so on linux and a libcollections.dylib on OSX.

The run.sh file will link the extention based on your infra and run the test.php file



## Scripts
`composer fix`: Run php-cs-fixer

`composer test`: Run test suite

`composer coverage`: Generate coverage report

`composer analyze`: Generate static analysis report

## Roadmap

### Critical
- [ ] Refactor to generators
- [ ] Rust bindings? (@MichielBier)

### The basics & too lazy to think of a category
- [x] each
- [x] reduce
- [ ] tap
- [ ] sum
- [ ] average/avg
- [ ] contains
- [x] first
- [x] last
- [ ] merge
- [ ] isEmpty (refactor empty conditionals afterwards)
### Filtering
- [ ] filter
- [ ] except
- [ ] only
### Sorting
- [ ] sort
- [ ] sortBy
- [ ] sortByDesc
### Transforming
- [x] map
- [ ] flatMap
- [ ] mapWithKeys
- [ ] mapSpread
- [ ] count
- [ ] keys
- [ ] values
### Representations
- [ ] all/toArray
- [ ] toJson
### Conditionals
- [x] when
- [x] whenEmpty
- [x] whenNotEmpty
- [x] unless
- [x] unlessEmpty
- [x] unlessNotEmpty
