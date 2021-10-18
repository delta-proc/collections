use ext_php_rs::prelude::*;

#[php_function]
pub fn hello_world(name: String) -> String {
    format!("Hello, {}!", name)
}

// Required to register the extension with PHP.
#[php_module]
pub fn module(module: ModuleBuilder) -> ModuleBuilder {
    module
}
pub fn main(){
    println!("{} days", 31);
}
