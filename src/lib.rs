use ext_php_rs::prelude::*;
use std::collections::HashMap;

#[php_function]
pub fn hello_world(name: String) -> String {
    format!("Hello, {}!", name)
}

#[php_function]
pub fn rx_count(vec: Vec<i32>) -> usize {
    return vec.len();
}

#[php_function]
pub fn rx_max(vec: Vec<i32>) -> i32 {
    return *vec.iter().max().unwrap();
}

#[php_function]
pub fn rx_min(vec: Vec<i32>) -> i32 {
    return *vec.iter().min().unwrap();
}

#[php_function]
pub fn rx_first(vec: Vec<i32>) -> i32 {
    return *vec.first().unwrap();
}

#[php_function]
pub fn rx_last(vec: Vec<i32>) -> i32 {
    return *vec.last().unwrap();
}

#[php_function]
pub fn rx_contains(vec: Vec<i32>,x : i32) -> bool {
    if vec.contains(&x) { 
        return true;
    } else {
        return false;
    }
}

#[php_function]
pub fn rx_median(vec: Vec<i32>) -> i32 {
        let mut temp = vec.clone();
        temp.sort();
        let mid = temp.len() / 2;
        return temp[mid];
}

#[php_function]
pub fn rx_avg(vec: Vec<i32>) -> f32 {
   return vec.iter().sum::<i32>() as f32 / vec.len() as f32
}

#[php_function]
pub fn rx_mode(numbers: Vec<i32>) -> i32 {
    let mut occurrences = HashMap::new();

    for value in numbers {
        *occurrences.entry(value).or_insert(0) += 1;
    }

    return occurrences
        .into_iter()
        .max_by_key(|&(_, count)| count)
        .map(|(val, _)| val)
        .expect("Cannot compute the mode of zero numbers")
}



// Required to register the extension with PHP.
#[php_module]
pub fn module(module: ModuleBuilder) -> ModuleBuilder {
    module
}
pub fn main(){
    println!("{} days", 31);
}
