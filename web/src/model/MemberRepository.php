<?php


interface MemberRepository
{
    public function save(Member $member);
    public function getAll();
    public function findById(MemberId $memberId);
}