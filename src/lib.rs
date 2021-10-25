
use ext_php_rs::{prelude::*, types::ZendClassObject};
use std::collections::HashMap;

#[php_class]
#[derive(Debug, Default,Clone)]
 pub struct Collect {
     result: Vec<i32>,
 }

#[php_impl]
impl Collect {

    // No `#[constructor]` attribute required here - the result is `__construct`.
    pub fn __construct(result: Vec<i32> ) -> Self {
        Self { result }
    }

    #[getter]
    pub fn get_result(&self) -> Vec<i32> {
        self.result.clone()
    }

    #[setter]
    pub fn set_result(&mut self, result: Vec<i32>) {
        self.result = result;
    }

    pub fn count(&self) -> usize {
        return self.result.len();
    }

    pub fn max(&self) -> i32 {
        return *self.result.iter().max().unwrap();
    }

    pub fn min(&self) -> i32 {
        return *self.result.iter().min().unwrap();
    }

    pub fn first(&self) -> i32 {
        return *self.result.first().unwrap();
    }

    pub fn last(&self) -> i32 {
        return *self.result.last().unwrap();
    }

    pub fn contains(&self,vec: Vec<i32>,x : i32) -> bool {
        if vec.contains(&x) {
            return true;
        } else {
            return false;
        }
    }

    pub fn median(&self) -> i32 {
            let mut temp = self.result.clone();
            temp.sort();
            let mid = temp.len() / 2;
            return temp[mid];
    }


    pub fn avg(&self) -> f32 {
       return self.result.iter().sum::<i32>() as f32 / self.result.len() as f32
    }

    pub fn mode(&self) -> i32 {
        let mut occurrences = HashMap::new();

        for value in self.result.clone() {
            *occurrences.entry(value).or_insert(0) += 1;
        }

        return occurrences
            .into_iter()
            .max_by_key(|&(_, count)| count)
            .map(|(val, _)| val)
            .expect("Cannot compute the mode of zero numbers")
    }

    pub fn sum(&self,vec: Vec<i32>) -> i32 {
        let sum: i32 = vec.iter().sum();
        return sum;
    }


    //
    pub fn reverse(&self) -> Collect {
        let mut temp = self.result.clone();
        temp.reverse();
        let mut clone  = self.clone();
        clone.result = temp;
        return clone;
    }

    pub fn splice(&self,i : usize) -> Collect {
        let temp = self.result.clone();
        let mut clone  = self.clone();
        clone.result = temp[i..].to_vec();
        return clone;
    }



    pub fn sort(&self) -> Collect {
        let mut temp = self.result.clone();
        temp.sort();
        let mut clone  = self.clone();
        clone.result = temp;
        return clone;
    }

    pub fn get_raw_obj(#[this] this: &mut ZendClassObject<Collect>) {
        dbg!(this);
    }

}
// Required to register the extension with PHP.
#[php_module]
pub fn module(module: ModuleBuilder) -> ModuleBuilder {
    module
}
